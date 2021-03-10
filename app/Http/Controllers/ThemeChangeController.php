<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ThemeChangeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect to back
     */
    public function change(Request $request)
    {
        $selectedTheme = $request->input('themeName');
        if($selectedTheme === "Default"){
            Cookie::queue(Cookie::forget('selectedTheme'));
        }else {
            Cookie::queue('selectedTheme', $selectedTheme);
        }

        return redirect()->back()->withInput();
    }
}
