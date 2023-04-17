<?php

namespace Database\Seeders;

use Spatie\Permission\Contracts\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $addGeo = "add geologist";
        $addGeo = "add geologist";
        $addGeo = "add geologist";
        $addGeo = "add geologist";
        $addGeo = "add geologist";
        Permission::create(['name' => $addGeo]);
    }
}
