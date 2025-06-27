<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageupload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $imageName = time() . '.' . $request->file->extension();

        $request->file->move(public_path('assets/media'), $imageName);

        return [
            'location' => asset('assets/media/' . $imageName)
        ];
    }
}
