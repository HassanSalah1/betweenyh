<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Set dashboard theme.
     */
    public function theme($theme): RedirectResponse
    {
        $this->authorize('access_dashboard');
        if (!in_array($theme, ['dark', 'light'])) {
            abort(404);
        }
        session()->has('theme') ? session()->forget('theme') : '';
        session()->put('theme', $theme);
        return redirect()->back();
    }

    /**
     * Display a dashboard home page.
     */
    public function dashboard(): View
    {
        $this->authorize('access_dashboard');
        return view('dashboard.dashboard');
    }
}
