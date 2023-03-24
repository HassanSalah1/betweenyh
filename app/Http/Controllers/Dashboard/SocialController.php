<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' => __("Socials")]
        ];
        return view('dashboard.socials.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('socials.index'), 'name' => __("Socials")], ['name' => __("Create Social")]
        ];
        $roles = Role::all();
        return view('dashboard.socials.create', compact('roles', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $data = request()->all();
        if ($request->file('image')) {
            $data['image'] = Storage::put('public/socials', $request->image);
        }
      //dd($data);
        $data['sort'] = $request->sort ?? Social::max('sort') + 1;
        $social = Social::create($data);
        return redirect()->route('socials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('socials.index'), 'name' =>  __("Socials")], ['name' => __("Show Social")]
        ];
        return view('dashboard.socials.show', compact('social', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('socials.index'), 'name' =>  __("Socials")], ['name' => __("Edit Social")]
        ];
        $roles = Role::all();
        return view('dashboard.socials.edit', compact('social', 'roles', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social): RedirectResponse
    {

        $data = request()->all();

        if ($request->file('image')) {
            if ($social->image && Storage::exists($social->image)) {
                Storage::delete($social->image);
            }
            $data['image'] = Storage::put('public/socials', $request->image);
        }
        $data['sort'] = $request->sort ?? Social::max('sort') + 1;
        $social->update($data);
        // $social->syncPermissions($social->getPermissionsViaRoles($request->roles));
        // toastr()->success('Social has been updated successfuly', 'Success');
        return redirect()->route('socials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social): RedirectResponse
    {

        $social->delete();
        // toastr()->warning('Social has been updated successfully', 'Warning');
        return redirect()->back();
    }
}
