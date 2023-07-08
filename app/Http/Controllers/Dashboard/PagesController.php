<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PageStoreRequest;
use App\Http\Requests\Dashboard\PageUpdateRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function index(): View
    {
        $this->authorize('access_pages');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['name' => __("Pages")]
        ];
        return view('dashboard.pages.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create_pages');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('pages.index'), 'name' => __("Pages")], ['name' => __("Create Page")]
        ];

        return view('dashboard.pages.create', compact( 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageStoreRequest $request): RedirectResponse
    {
        $this->authorize('create_pages');

         Page::create($request->validated());

        // toastr()->success('Page has been created successfuly', 'Success');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $user): View
    {
        $this->authorize('show_pages');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('pages.index'), 'name' =>  __("Pages")], ['name' => __("Show Page")]
        ];
        return view('dashboard.pages.show', compact('user', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        $this->authorize('edit_pages');
        $breadcrumbs = [
            ['link' => route('dashboard'), 'name' => __('Dashboard')], ['link' => route('pages.index'), 'name' =>  __("Pages")], ['name' => __("Edit Page")]
        ];

        return view('dashboard.pages.edit', compact('page',  'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageUpdateRequest $request, Page $page): RedirectResponse
    {
        $this->authorize('edit_pages');
        $data = $request->all();

        $page->update($data);

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $this->authorize('delete_pages');
        $page->delete();
        // toastr()->warning('Page has been updated successfuly', 'Warning');
        return redirect()->back();
    }
}
