<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('access_users');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' => __("Users")]
        ];
        return view('dashboard.users.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create_users');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('users.index'), 'name' => __("Users")], ['name' => __("Create User")]
        ];
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create_users');
        $data = request()->except('roles', 'image');
        $data['password'] = Hash::make($request->password);
        $data['email_verified_at'] = Carbon::now();
        // $data['status'] = 1;

        $user = User::create($data);
        if ($request->roles) {
            $user->syncRoles($request->roles);
            // $user->syncPermissions($user->getPermissionsViaRoles($request->roles));
        } else {
            // $user->assignRole('user');
        }
        // toastr()->success('User has been created successfuly', 'Success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $this->authorize('show_users');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('users.index'), 'name' =>  __("Users")], ['name' => __("Show User")]
        ];
        return view('dashboard.users.show', compact('user', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $this->authorize('edit_users');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('users.index'), 'name' =>  __("Users")], ['name' => __("Edit User")]
        ];
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authorize('edit_users');
        $data = request()->except('roles', 'image');
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        // $data['status'] = 1;

        $user->update($data);
        $user->syncRoles($request->roles);
        // $user->syncPermissions($user->getPermissionsViaRoles($request->roles));
        // toastr()->success('User has been updated successfuly', 'Success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete_users');
        $user->delete();
        // toastr()->warning('User has been updated successfuly', 'Warning');
        return redirect()->back();
    }

    /**
     * Form of add one or more specified permission to user.
     */
    public function editPermission(User $user): View
    {
        $this->authorize('edit_users');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('users.index'), 'name' => "Users"], ['name' => "Edit User Permissions"]
        ];
        $user->load('permissions');
        $permissions = Permission::all();
        return view('dashboard.users.permissions', compact('user', 'permissions', 'breadcrumbs'));
    }

    /**
     * Add one or more specified permission to user.
     */
    public function updatePermission(Request $request, User $user): RedirectResponse
    {
        $this->authorize('edit_users');
        $user->syncPermissions($request->permissions);
        // toastr()->success('User permissions has been updated successfuly', 'Success');
        return redirect()->route('users.index');
    }
}
