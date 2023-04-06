<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Geologist;
use App\Models\Role;

class GeologistController extends Controller
{
    public function createGeologist(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'specialization' => 'required|string|max:255',
        ]);

        // Create the geologist
        $geologist = Geologist::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'specialization' => $validatedData['specialization'],
            'role_id' => Role::where('name', 'geologist')->firstOrFail()->id,
        ]);

        // Redirect to the geologist's profile page
        return redirect('/geologists/' . $geologist->id);
    }

    public function readGeologist($id)
    {
        // Get the geologist
        $geologist = Geologist::findOrFail($id);

        // Return the geologist's profile page
        return view('geologist.profile', ['geologist' => $geologist]);
    }

    public function updateGeologist(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'specialization' => 'required|string|max:255',
        ]);

        // Get the geologist
        $geologist = Geologist::findOrFail($id);

        // Update the geologist's information
        $geologist->name = $validatedData['name'];
        $geologist->email = $validatedData['email'];
        $geologist->specialization = $validatedData['specialization'];
        if (!empty($validatedData['password'])) {
            $geologist->password = Hash::make($validatedData['password']);
        }
        $geologist->save();

        // Redirect to the geologist's profile page
        return redirect('/geologists/' . $geologist->id);
    }

    public function deleteGeologist($id)
    {
        // Get the geologist
        $geologist = Geologist::findOrFail($id);

        // Delete the geologist
        $geologist->delete();

        // Redirect to the list of geologists
        return redirect('/geologists');
    }
}
