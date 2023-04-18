<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    public function changeUserRole($userId, $roleId)
    {
        $roleName = Role::where('id',$roleId)->value('name');

        // First, retrieve the user by their ID
        $user = User::find($userId);

        // Next, retrieve the role by its ID
        // $role = Role::findById($roleId);

        // Finally, assign the role to the user
        $user->syncRoles([$roleName]);
    }


}

