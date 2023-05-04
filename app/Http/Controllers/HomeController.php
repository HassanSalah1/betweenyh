<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Set App Lang.
     *
     * @return \Illuminate\Http\Response
     */
    public function setLocale($lang): RedirectResponse
    {
        if (!in_array($lang, ['en', 'ar'])) {
            abort(404);
        }
        session()->has('lang') ? session()->forget('lang') : '';
        session()->put('lang', $lang);

        App::setLocale($lang);
        return redirect()->back();
    }

    /**
     * Show the application welcome page.
     */
    public function welcome(): View
    {
        return view('welcome');
    }

    /**
     * rediract user to dashboard page
     */
    public function dashboard(): RedirectResponse
    {
        // dd('dashboard');
        return redirect()->route('admin.dashboard');
    }

}
