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
        $viewNotif= 'view notifications';
        $viewFinalTask= 'view finalized tasks';
        $viewTask= 'view tasks';
        $updateTask= 'update tasks';
        $deleteTask= 'delete tasks';
        $addTask= 'add tasks';
        $changeRole = 'change role';
        $deleteGeologist = 'Delete geologist';
        $acceptOrRedoIt='Accept task_file or redo it';
        Permission::create(['name' => $viewNotif ]);
        Permission::create(['name' => $viewFinalTask]);
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
        $viewNotif = 'view notifications';
        $viewTask= 'view tasks';
        $viewFinalTask = 'view finalized tasks';
        $updateFinalTask= 'update finalized tasks';
        $deleteFinalTask = 'delete finalized tasks';
        $addFinalTask = 'add finalized tasks';
        $viewTaskAdded= 'view task added';
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
        $Geomatician='office-geologist';
        //Create Roles
        Role::create(['name'=> $superAdmin])->givePermissionsTo(Permission::all());

    }
}
