<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('access_roles');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' =>  __("Roles")]
        ];
        return view('dashboard.roles.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create_roles');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('roles.index'), 'name' => __("Roles")], ['name' => __("Create Role")]
        ];
        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('breadcrumbs', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create_roles');
        $role = Role::create($request->except('permissions'));
        $role->syncPermissions($request->input('permissions', []));
        // toastr()->success('Role has been created successfuly', 'Success');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        $this->authorize('show_roles');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('roles.index'), 'name' => __("Roles")], ['name' => __("Show Role")]
        ];
        return view('dashboard.roles.show', compact('role', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $this->authorize('edit_roles');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('roles.index'), 'name' => __("Roles")], ['name' => __("messages.Edit Role")]
        ];
        $permissions =  Permission::all();
        return view('dashboard.roles.edit', compact('role', 'permissions', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $this->authorize('edit_roles');
        $role->update($request->except('permissions'));
        $role->syncPermissions($request->input('permissions', []));
        // toastr()->success('Role has been updated successfuly', 'Success');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->authorize('delete_roles');
        $role->delete();
        // toastr()->warning('Role has been deleted successfuly', 'Warning');
        return redirect()->route('roles.index');
    }
}
