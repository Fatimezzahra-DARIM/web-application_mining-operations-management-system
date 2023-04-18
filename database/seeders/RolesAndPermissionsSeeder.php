<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        //admin permissions
        $viewNotifAdmin= 'admin view notifications';
        // $viewFinalTask= 'view finalized tasks';
        $viewTask= 'view tasks';
        $updateTask= 'update tasks';
        $deleteTask= 'delete tasks';
        $addTask= 'add tasks';
        $changeRole = 'change role';
        $deleteGeologist = 'Delete geologist';
        $acceptOrRedoIt='Accept task_file or redo it';
        Permission::create(['name' => $viewNotifAdmin ]);
        // Permission::create(['name' => $viewFinalTask]);
        Permission::create(['name' => $viewTask]);
        Permission::create(['name' => $updateTask]);
        Permission::create(['name' => $deleteTask]);
        Permission::create(['name' => $addTask ]);
        Permission::create(['name' => $changeRole]);
        Permission::create(['name' => $deleteGeologist]);
        Permission::create(['name' => $acceptOrRedoIt]);

        // Geologist permissions
        $viewDashboard= 'view dashboard';
        Permission::create(['name' => $viewDashboard]);

        //Geologist:Field-Lab-office
        $viewNotif = ' geologist view notifications';
        $viewTask= ' field-geologist view tasks';
        $viewFinalTask = ' view finalized tasks';
        $updateFinalTask= 'field-geologist update finalized tasks';
        $deleteFinalTask = 'field-geologistdelete finalized tasks';
        $addFinalTask = 'field-geologist add finalized tasks';
        $viewTaskAdded= 'field-geologist view task added';
        Permission::create(['name' => $viewNotif]);
        Permission::create(['name' => $viewTask]);
        Permission::create(['name' => $viewFinalTask]);
        Permission::create(['name' => $updateFinalTask]);
        Permission::create(['name' => $deleteFinalTask]);
        Permission::create(['name' => $addFinalTask]);
        Permission::create(['name' => $viewTaskAdded]);
        // Define Roles Available
        $superAdmin='admin';
        $geologist='geologist';
        $fieldGeologist= 'field-geologist';
        $laboratoryGeologist= 'laboratory-geologist';
        $geomatician='office-geologist';
        //Create Roles
        Role::create(['name'=> $superAdmin])->syncPermissions([
            $viewNotif,
            $viewFinalTask,
            $viewTask,
            $updateTask,
            $deleteTask,
            $addTask,
            $changeRole,
            $deleteGeologist,
            $acceptOrRedoIt,
        ]);
        Role::create(['name' => $geologist])->syncPermissions($viewDashboard);

        Role::create(['name'=> $fieldGeologist]) ->syncPermissions([
            $viewNotif,
            $viewTask,
            $viewFinalTask,
            $updateFinalTask,
            $deleteFinalTask,
            $addFinalTask,
            $viewTaskAdded,
        ]);
        Role::create(['name'=> $laboratoryGeologist]) ->syncPermissions([$viewNotif,
            $viewTask,
            $viewFinalTask,
            $updateFinalTask,
            $deleteFinalTask,
            $addFinalTask,
            $viewTaskAdded,
        ]);
        Role::create(['name' => $geomatician])->syncPermissions([$viewNotif,
            $viewTask,
            $viewFinalTask,
            $updateFinalTask,
            $deleteFinalTask,
            $addFinalTask,
            $viewTaskAdded,
        ]);
    }
}
