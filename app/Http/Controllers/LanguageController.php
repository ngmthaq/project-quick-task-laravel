<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        Session::put(
            Config::get('app.locale_session_key'),
            $lang
        );

        return redirect()->back();
    }
}
