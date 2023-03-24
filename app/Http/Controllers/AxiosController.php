<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AxiosController extends Controller
{
    /**
     * Get all permissionss.
     */
    public function permissions(): Collection
    {
        $permissions = Permission::all();
        return $permissions;
    }

    /**
     * Get all roles.
     */
    public function roles(): Collection
    {
        $roles = Role::all();
        return $roles;
    }

    /**
     * Get all users .
     */
    public function users(): Collection
    {
        $users = User::all();
        return $users;
    }
    public function socials(): Collection
    {
        return Social::orderBy('sort', 'ASC')->get();
    }
}
