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
    public function store(Request $request)
    {
        $role_id = $request->input('role_id');

        // Get all the users with the selected role
        $users = User::where('role_id', $role_id)->get();

        // Store the task in the database
        $task = new Task;
        $task->title = $request->input('title');
        $task->save();

        // Assign the task to the selected users
        $task->users()->attach($users);

        // Redirect to the previous page with a success message
        return back()->with('success', 'Task created successfully.');
    }
}
