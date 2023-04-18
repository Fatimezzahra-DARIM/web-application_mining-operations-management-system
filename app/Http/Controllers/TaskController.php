<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Retrieve all the geologists from the database
        return view('template/adminDashboard/contents/tableTasks', ['tasks'=>$tasks]); // Pass the $geologists variable to the view
    }
}
