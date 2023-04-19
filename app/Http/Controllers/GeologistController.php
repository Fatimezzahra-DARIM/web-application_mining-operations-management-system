<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Geologist;
use App\Models\Role;
use App\Models\User;

class GeologistController extends Controller
{
    public function index()
    {
        $geologists = User::all(); // Retrieve all the geologists from the database
        return view('template/adminDashboard/contents/tableGeologists', ['geologists'=>$geologists]); // Pass the $geologists variable to the view
    }
    // public function updateRole(Request $request)
    // {
        // $id = $request->input('user_id');
        // dd($id);
        // dd('ana dkhlt');
        // $geologist = User::findOrFail($id);
        // $geologist->role = $request->input('role');
        // $geologist->save();
        // return view('manage', ['geologists' => $geologist])->with('success', 'Role updated successfully');

    // }


    // public function readGeologist($id)
    // {
    //     // Get the geologist
    //     $geologist = Geologist::findOrFail($id);

    //     // Return the geologist's profile page
    //     return view('geologist.profile', ['geologist' => $geologist]);
    // }
    public function getUsersByRole($roleId)
{
    $users = User::whereHas('roles', function($query) use ($roleId) {
        $query->where('id', $roleId);
    })->get();

    return response()->json($users);
}


    public function deleteGeologist($id)
    {
        // Get the geologist
        $geologist = User::findOrFail($id);

        // Delete the geologist
        $geologist->delete();

        // Redirect to the list of geologists
        // return redirect('manage')->with('success', 'Geologist deleted successfully');
        return redirect()->back()->with('success', 'Geologist deleted successfully!');
    }
}
