<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{public function updateRole(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        // Call the changeUserRole method from your Admin model to update the user's role
        $admin = new Admin();
        $admin->changeUserRole($userId, $roleId);

        // Redirect the user to the previous page or a success page
        return redirect()->back()->with('success', 'User role has been updated.');
    }
}
