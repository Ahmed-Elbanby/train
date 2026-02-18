<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Modul;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('task', compact('projects'));
    }

    public function getT1Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $employees = Employee::when($projectId !== 'all', function ($query) use ($projectId) {
            return $query->whereHas('workTimes', function ($q) use ($projectId) {
                $q->where('project_id', $projectId);
            });
        })->get();

        return response()->json(['data' => $employees]);
    }

    public function getT2Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $projects = Project::query()
            ->when($projectId !== 'all', fn($q) => $q->where('id', $projectId))
            ->addSelect([
                'start_date' => WorkTime::selectRaw('MIN(date)')
                    ->whereColumn('project_id', 'projects.id'),
                'end_date' => WorkTime::selectRaw('MAX(date)')
                    ->whereColumn('project_id', 'projects.id'),
                'total_employees' => WorkTime::selectRaw('COUNT(DISTINCT emp_id)')
                    ->whereColumn('project_id', 'projects.id'),
                'total_cost' => WorkTime::selectRaw('ROUND(SUM(hours * (SELECT salary / 30 / 8 FROM employees WHERE employees.id = work_times.emp_id)), 2)')
                    ->whereColumn('project_id', 'projects.id')
            ])
            ->get()
            ->map(function ($project) {
                return [
                    'project_id' => $project->id,
                    'project_name' => $project->name,
                    'start_date' => $project->start_date,
                    'end_date' => $project->end_date,
                    'total_days' => $project->total_days,
                    'total_employees' => $project->total_employees,
                    'total_cost' => $project->total_cost,
                ];
            });

        return response()->json(['data' => $projects]);
    }

    public function getT3Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $logs = WorkTime::with(['employee', 'project', 'modul'])
            ->when($projectId !== 'all', fn($query) => $query->where('project_id', $projectId))
            ->orderBy('date', 'asc')
            ->get()
            ->map(fn($log) => [
                'date' => $log->date,
                'employee' => $log->employee->name,
                'project' => $log->project->name,
                'hours' => $log->hours,
                'modul' => $log->modul->name,
            ]);

        return response()->json(['data' => $logs]);
    }

    public function getT4Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        // Single query with joins – database does the grouping and summing
        $data = WorkTime::join('moduls', 'work_times.modul_id', '=', 'moduls.id')
            ->join('projects', 'work_times.project_id', '=', 'projects.id')
            ->select(
                'moduls.name as modul_name',
                'projects.name as project_name',
                DB::raw('SUM(work_times.hours) as total_hours')
            )
            ->when($projectId !== 'all', fn($q) => $q->where('work_times.project_id', $projectId))
            ->groupBy('moduls.id', 'projects.id', 'moduls.name', 'projects.name')
            ->orderBy('projects.id')
            ->orderBy('projects.name')
            ->get()
            ->map(fn($item) => [
                'modul_name' => $item->modul_name,
                'project_name' => $item->project_name,
                'hours' => round($item->total_hours, 1),
            ]);

        return response()->json(['data' => $data]);
    }

    public function getT5Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        // 1️⃣ Get aggregated hours per employee per date (database does the grouping & summing)
        $workLogs = WorkTime::select('emp_id', 'date', DB::raw('SUM(hours) as total_hours'))
            ->when($projectId !== 'all', fn($q) => $q->where('project_id', $projectId))
            ->groupBy('emp_id', 'date')
            ->orderBy('date')
            ->get();

        // 2️⃣ Extract unique dates (sorted) using collection methods
        $dates = $workLogs->pluck('date')->map(fn($d) => $d->format('Y-m-d'))->unique()->values()->toArray();

        // 3️⃣ Get all unique employee IDs from logs, then fetch their names
        $employeeIds = $workLogs->pluck('emp_id')->unique();
        $employees = Employee::whereIn('id', $employeeIds)->orderBy('name')->get(['id', 'name']);

        // 4️⃣ Build a lookup: employee_id → date → hours (using collection groupBy)
        $hoursLookup = $workLogs->groupBy('emp_id')->map->keyBy(function ($item) {
            return $item->date->format('Y-m-d');
        })->map->map(function ($item) {
            return round($item->total_hours, 1);
        });

        // 5️⃣ Build rows: each employee → array of hours per date (using collection map)
        $rows = $employees->map(function ($employee) use ($dates, $hoursLookup) {
            $row = ['employee' => $employee->name];
            foreach ($dates as $date) {
                $row[$date] = $hoursLookup[$employee->id][$date] ?? '-';
            }
            return $row;
        });

        return response()->json([
            'dates' => $dates,
            'rows' => $rows
        ]);
    }

}
