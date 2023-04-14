<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' => __("Order")]
        ];
        return view('dashboard.orders.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('orders.index'), 'name' => __("Socials")], ['name' => __("Create Social")]
        ];
        $roles = Role::all();
        return view('dashboard.orders.create', compact('roles', 'breadcrumbs'));
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
        $order = Social::create($data);
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $order): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('orders.index'), 'name' =>  __("Socials")], ['name' => __("Show Social")]
        ];
        return view('dashboard.orders.show', compact('order', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {

        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('orders.index'), 'name' =>  __("Orders")], ['name' => __("Edit Order")]
        ]; 
        return view('dashboard.orders.edit', compact('order', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {

        $data = request()->all();
        $order->update($data);
        // toastr()->success('Social has been updated successfuly', 'Success');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {

        $order->delete();
        // toastr()->warning('Social has been updated successfully', 'Warning');
        return redirect()->back();
    }
}
