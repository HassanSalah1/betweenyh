<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PermissionStoreRequest;
use App\Http\Requests\Dashboard\PermissionUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('access_permissions');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' => __("Permissions")]
        ];
        return view('dashboard.permissions.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create_permissions');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('permissions.index'), 'name' => __("Permissions")], ['name' => __("Create Permission")]
        ];
        return view('dashboard.permissions.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionStoreRequest $request): RedirectResponse
    {
        $this->authorize('create_permissions');
        Permission::create($request->all());
        // toastr()->success('Permission has been created successfuly', 'Success');
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Permission $permission): View
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission): View
    {
        $this->authorize('edit_permissions');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('permissions.index'), 'name' => __("Permissions")], ['name' => __("Edit Permission")]
        ];
        return view('dashboard.permissions.edit', compact('permission', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionUpdateRequest $request, Permission $permission): RedirectResponse
    {
        $this->authorize('edit_permissions');
        $permission->update($request->all());
        // toastr()->success('Permission has been updated successfuly', 'Success');
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        $this->authorize('delete_permissions');
        $permission->delete();
        // toastr()->warning('Permission has been deleted successfuly', 'Warning');
        return redirect()->route('permissions.index');
    }
}
