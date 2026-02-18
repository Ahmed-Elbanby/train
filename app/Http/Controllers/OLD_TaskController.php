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

        $employeesQuery = Employee::query();

        if ($projectId !== 'all') {
            $employeesQuery->where('project_id', $projectId);
        }

        $employees = $employeesQuery->get();

        foreach ($employees as $employee) {
            $employee->hour_cost = round($employee->salary / 30 / 8, 2);
        }

        return response()->json(['data' => $employees]);
    }

    public function getT2Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $projectsQuery = Project::query();

        if ($projectId !== 'all') {
            $projectsQuery->where('id', $projectId);
        }

        $Tab2 = $projectsQuery->get()->map(function ($project) {

            // COL-3: Get start date
            $startDate = WorkTime::where('project_id', $project->id)->min('date');

            // COL-4: Get end date
            $endDate = WorkTime::where('project_id', $project->id)->max('date');

            // COL-5: Calculate total days difference
            $totalDays = 0;
            if ($startDate && $endDate) {
                $start = Carbon::parse($startDate);
                $end = Carbon::parse($endDate);
                $totalDays = $start->diffInDays($end) + 1;
            }

            // COL-6: Get All Employee IDs
            $employeeIds = WorkTime::where('project_id', $project->id)
                ->distinct('emp_id')
                ->pluck('emp_id');

            $totalEmployees = $employeeIds->count();

            // COL-7: Calculate Total Cost
            $totalProjectCost = 0;
            foreach ($employeeIds as $employeeId) {
                $employeeSalary = Employee::where('id', $employeeId)->value('salary');

                $employeeSalaryPerHour = $employeeSalary / 30 / 8;

                $workTimes = WorkTime::where('project_id', $project->id)->where('emp_id', $employeeId)->get();
                foreach ($workTimes as $workTime) {
                    $totalProjectCost += $workTime->hours * $employeeSalaryPerHour;
                }
            }

            // Return Table 2 Data
            return [
                'project_id' => $project->id,
                'project_name' => $project->name,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_days' => $totalDays,
                'total_employees' => $totalEmployees,
                'total_cost' => round($totalProjectCost, 2),
            ];
        });

        return response()->json(['data' => $Tab2]);
    }

    public function getT3Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $query = WorkTime::with(['employee', 'project', 'modul']);

        if ($projectId !== 'all') {
            $query->where('project_id', $projectId);
        }

        $logs = $query->orderBy('date', 'asc')
            ->get()
            ->map(function ($log) {
                return [
                    'date' => $log->date->format('Y-m-d'),
                    'employee' => $log->employee->name,
                    'project' => $log->project->name,
                    'hours' => $log->hours,
                    'modul' => $log->modul->name,
                ];
            });

        return response()->json(['data' => $logs]);
    }

    public function getT4Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        $query = WorkTime::with(['modul', 'project']);

        if ($projectId !== 'all') {
            $query->where('project_id', $projectId);
        }

        $logs = $query->orderBy('project_id', 'asc')
            ->get()
            ->map(function ($workTime) {
                return [
                    'modul_name' => $workTime->modul->name,
                    'project_name' => $workTime->project->name,
                    'hours' => $workTime->hours,
                ];
            });

        return response()->json(['data' => $logs]);
    }

    public function getT5Data(Request $request)
    {
        $projectId = $request->input('project_id', 'all');

        // Get all dates
        $datesQuery = WorkTime::select('date')->distinct()->orderBy('date', 'asc');
        if ($projectId !== 'all') {
            $datesQuery->where('project_id', $projectId);
        }
        $dates = [];
        foreach ($datesQuery->get() as $item) {
            $dates[] = $item->date->format('Y-m-d');
        }

        // Get all employees
        $empIdsQuery = WorkTime::select('emp_id')->distinct();
        if ($projectId !== 'all') {
            $empIdsQuery->where('project_id', $projectId);
        }
        $empIds = [];
        foreach ($empIdsQuery->get() as $item) {
            $empIds[] = $item->emp_id;
        }

        // Get employee details
        $employees = Employee::whereIn('id', $empIds)->orderBy('name')->get();

        // for each employee get work hours for each date
        $rows = [];
        foreach ($employees as $employee) {
            $row = ['employee' => $employee->name];
            foreach ($dates as $date) {
                $query = WorkTime::where('emp_id', $employee->id)
                    ->where('date', $date);
                if ($projectId !== 'all') {
                    $query->where('project_id', $projectId);
                }
                $totalHours = $query->sum('hours');
                $row[$date] = round($totalHours, 1);
            }
            $rows[] = $row;
        }
        return response()->json(['dates' => $dates, 'rows' => $rows]);
    }

}
