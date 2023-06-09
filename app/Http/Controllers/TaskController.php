<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Mail\TaskMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::all();
        // $adminId;
        // foreach ($tasks as $task) {
        //     $adminId=$task->admin_id;
        // }

        // $admin=User::find($adminId)->first();
        // $adminName=$admin->name;
        $tasks = Task::with('admin','users')->get();
        // dd($adminName);
        // return view('tasks.index', compact('tasks'));
        return view('template/adminDashboard/contents/tableTasks', ['tasks'=>$tasks]);
        // return view('template/adminDashboard/contents/tableTasks', ['tasks'=>$tasks, 'adminName'=>$adminName]);
    }
    public function task()
    {
        $user=Auth::user();

        // $user = User::with('tasks.taskFile')->find($user->id);
        $tasks = Task::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->with(['taskFile' => function($query) {
            $query->where('user_id', auth()->user()->id);
        }, 'taskFile.user'])
        ->get();
        // dd($tasks);
        return view('template/geologistDashboard/file', ['tasks'=>$tasks]);

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|max:255',
            'user_ids.*' => 'required'
        ]);
        $id_Admin=Auth::user()->id;
        $task = new Task();
        $task->task_name = $validatedData['title'];
        $task->task_description = $validatedData['description'];
        $task->admin_id=$id_Admin;
        $task->save();
        foreach($validatedData['user_ids'] as $userId){
            $task->users()->attach($userId);
        }
        foreach($validatedData['user_ids'] as $userId){
            $user_email = User::find($userId)->email;
            // dd($user_email);
            Mail::to($user_email)->send(new TaskMail());
        }


        return redirect()->back();
    }
    public function edit(Task $task)
{
    $users = User::all();
    return view('template/adminDashboard/contents/editTask', compact('task', 'users'));
}

public function update(Request $request, Task $task)
{
    $validatedData = $request->validate([
        'title' => 'string',
        'description' => 'max:255',
        'user_ids.*' => 'required',
        'role_id'=> 'required'
    ]);

if($request)
    $task->task_name = $validatedData['title'];
    $task->task_description = $validatedData['description'];
    $task->users()->detach();
    $task->users()->sync($validatedData['user_ids']);
    $task->save();

    return redirect()->back()->with('success', 'Task updated successfully');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->back()->with('success', 'Task deleted successfully');
}

}

























// class TaskController extends Controller
// {
//     public function index()
//     {
//         $tasks = Task::all(); // Retrieve all the geologists from the database
//         return view('template/adminDashboard/contents/tableTasks', ['tasks'=>$tasks]); // Pass the $geologists variable to the view
//     }
//     public function store(Request $request)
//     {
//         $role_id = $request->input('role_id');

//         // Get all the users with the selected role
//         $users = User::where('role_id', $role_id)->get();

//         // Store the task in the database
//         $task = new Task;
//         $task->title = $request->input('title');
//         $task->save();

//         // Assign the task to the selected users
//         $task->users()->attach($users);

//         // Redirect to the previous page with a success message
//         return back()->with('success', 'Task created successfully.');
//     }
// }
