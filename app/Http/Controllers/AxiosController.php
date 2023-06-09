<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Page;
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
    public function users()
    {
        return User::all()->map(function ($user){
            return [
              'id' => $user->id,
              'name' => $user->name,
              'email' => $user->email,
              'created_at' => $user->created_at->format('Y-m-d h:i:s A'),
              'created_at_from' => $user->created_at->diffForHumans(),
            ];
        });

    }
    public function socials(): Collection
    {
        return Social::orderBy('sort', 'ASC')->get();
    }
    public function orders()
    {
        return Order::all()->map(function ($order){
            return [
                'id' => $order->id,
                'name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'status' => $order->status,
                'price' => $order->price,
                'created_at' => $order->created_at->format('Y-m-d h:i:s A'),
                'created_at_from' => $order->created_at->diffForHumans(),
            ];
        });

    }

    public function pages(): Collection
    {
        return Page::all();

    }

}
