<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Modul;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        // Get projects for dropdown
        $projects = Project::all();
        $employees = Employee::all();
        $moduls = Modul::all();
        $workTimes = WorkTime::all();
        
        return view('task', compact('projects', 'employees', 'moduls', 'workTimes'));
    }
}
