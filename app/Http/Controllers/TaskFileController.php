<?php

namespace App\Http\Controllers;

use App\Models\TaskFile;
use Illuminate\Http\Request;

class TaskFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskFiles = TaskFile::all();
        return view('template/adminDashboard/contents/taskFile', ['taskFiles'=>$taskFiles]);
        //  view('taskFile.index'
    }

    public function downloadFile(TaskFile $taskFile)
    {
        $fileContents = file_get_contents($taskFile->file_path);

        $response = response($fileContents);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="' . $taskFile->file_name . '"');

        return $response;

        // return response()->download($taskFile->file_path);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task_files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'description' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048',
            'task_id' => 'required|exists:tasks,id',
        ]);
        //  dd($validatedData);

        $taskFile = new TaskFile;
        $taskFile->description = $validatedData['description'];
        $taskFile->user_id = auth()->id();
        $taskFile->task_id = $validatedData['task_id'];
        // $taskFile->file_path = $request->file('pdf')->store('pdfs');
        $pdf = $validatedData['pdf'];
        $pdfName = $pdf->getClientOriginalName();
        $pdfPath = $pdf->storeAs('pdfs', $pdfName);

        $url = asset('storage/app/' . $pdfPath);

        // Update the task with the PDF file path
        $taskFile->file_path = $url;
        $taskFile->save();

        // $taskFile->save();

        return redirect()->back()->with('success', 'Task file created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskFile  $taskFile
     * @return \Illuminate\Http\Response
     */
    public function show(TaskFile $taskFile)
    {
        return view('task_files.show', compact('taskFile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskFile  $taskFile
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskFile $taskFile)
    {
        return view('task_files.edit', compact('taskFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskFile  $taskFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskFile $taskFile)
    {
        $validatedData = $request->validate([
            'description' => 'string',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->description) {
            $taskFile->description = $validatedData['description'];
        }
        if ($request->hasFile('pdf')) {
            $pdf = $validatedData['pdf'];
            $pdfName = $pdf->getClientOriginalName();
            $pdfPath = $pdf->storeAs('pdfs', $pdfName);

            // Update the task with the PDF file path
            $taskFile->file_path = $pdfPath;
        }
        $taskFile->save();
        return redirect()->back()->with('success', 'Task file updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskFile  $taskFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskFile $taskFile)
    {
        $taskFile->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');;

    }

}
// public function index(){
//     dd(TaskFile::with('user','task')->get());
// }
