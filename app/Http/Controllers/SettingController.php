<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general(){
        auth()->user()->load('profile');
        return view('bend.setting.general');
    }

    public function store(Request $request){
        return redirect()->back()->with('success','Changes are Saved.');
    }
}
