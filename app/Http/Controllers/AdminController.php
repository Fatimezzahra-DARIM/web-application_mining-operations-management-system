<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        // dd('db');
        $geologists=DB::select("SELECT count(*) as Geologists from `users` where exists ( select * from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `users`.`id` = `model_has_roles`.`model_id` and `id` = 2 );");
        $Fgeologist=DB::select("SELECT count(*) as Field_Geologist from `users` where exists ( select * from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `users`.`id` = `model_has_roles`.`model_id` and `id` = 3 );");
        $Lgeologist=DB::select("SELECT count(*) as Laboratory_Geologist from `users` where exists ( select * from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `users`.`id` = `model_has_roles`.`model_id` and `id` = 4 );");
        $Ogeologist=DB::select("SELECT count(*) as Office_Geologist from `users` where exists ( select * from `roles` inner join `model_has_roles` on `roles`.`id` = `model_has_roles`.`role_id` where `users`.`id` = `model_has_roles`.`model_id` and `id` = 5 );");
        // dd($Fgeologist);

        return view('template/adminDashboard/contents/dashboard',compact('geologists','Fgeologist','Lgeologist','Ogeologist'));
    }




    public function updateRole(Request $request)
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
