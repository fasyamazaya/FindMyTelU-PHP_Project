<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // These are administrator permissions, they should stay
    $admin_permissions = Permission::all();
    Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

    // These are users permissions to admin area
    // That block should be removed
    $user_permissions = $admin_permissions->filter(function ($permission) {
        return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
    });
    Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
