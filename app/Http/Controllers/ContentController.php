<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as IlluminateInput;

class ContentController extends Controller
{
    //
    public function home()
    {
        $data = [
            'version' => '0.1.2'
        ];
        $lastupdate = request()->session()->has('last_update') ? request()->session()->pull('last_update') : 'none';
        $data['last_update'] = $lastupdate;
        return view('content.home')->with($data);
    }
    public function upload(Request $request)
    {
        $data = [];
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'image_upload' => 'required|image'
            ]);

            IlluminateInput::file('image_upload')->move('images','attractions.jpg');

            return redirect('/');
        }

        return view('content.upload')->with($data);
    }
}
