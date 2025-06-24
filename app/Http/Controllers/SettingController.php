<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [];

        $dbSettings = Setting::all();

        foreach ($dbSettings as $dbSetting) {
            $settings[$dbSetting->name] = $dbSetting->content;
        }

        return view('admin.settings.index', ['settings' => $settings]);
    }
}
