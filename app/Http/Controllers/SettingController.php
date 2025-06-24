<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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



    public function save(Request $request)
    {


        $data = $request->only([
            'title',
            'subtitle',
            'email',
            'bgcolor',
            'textcolor'
        ]);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect(route('settings'))
                ->withErrors($validator);
        }

        echo 'salvando';
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}
