<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ShopProfile;

class SettingController extends Controller
{
    public function general(){
        auth()->user()->load(['profile','profileImage','coverImage']);
        // dd(auth()->user());
        return view('bend.setting.general');
    }

    public function store(Request $request){

        User::find(auth()->user()->id)
            ->update([
                'name'=>request('name'),
                'email'=>request('email'),
                'mobile'=>request('mobile'),
                'telephone'=>request('telephone'),
                'profile_image'=>request('profile_image'),
                'cover_image'=>request('cover_image')
            ]);
        ShopProfile::updateOrCreate(
            ['user_id'=>auth()->user()->id],
            [
                'info'=>$request->info,
                'address'=>$request->address,
                'opening_hours'=>$request->opening_hours,
                'established_at'=>$request->established_at,
                'sologon'=>$request->sologon
            ]);

        return redirect()->back()->with('success','Changes are Saved.');
    }
}
