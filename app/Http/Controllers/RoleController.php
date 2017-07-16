<?php

namespace App\Http\Controllers;

use App\http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
        $createUsersPermission = Permission::create([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);

        $deleteUsersPermission = Permission::create([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);
        $user = User::find(1);

        $user->attachRole($user); // you can pass whole object, or just an id
        return 'done';
    }
}
