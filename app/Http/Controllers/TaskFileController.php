<?php

namespace App\Http\Controllers;

use App\Models\TaskFile;
use Illuminate\Http\Request;

class TaskFileController extends Controller
{
    public function index(){
        dd(TaskFile::with('user','task')->get());
    }
}
