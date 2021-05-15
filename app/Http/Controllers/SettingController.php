<?php

namespace App\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domain\Users\Models\User;
use App\Models\ShopProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class SettingController
 *
 * @package App\Http\Controllers
 */
class SettingController extends Controller
{
    public function general()
    {
        /** @var User $user */
        $user = auth()->user();

        $user->load(['profile', 'profileImage', 'coverImage']);

        return view('bend.setting.general');
    }

    public function store(Request $request): RedirectResponse
    {
        User::find(auth()->user()->id)
            ->update([
                'name'          => request('name'),
                'email'         => request('email'),
                'mobile'        => request('mobile'),
                'telephone'     => request('telephone'),
                'profile_image' => request('profile_image'),
                'cover_image'   => request('cover_image'),
            ]);
        ShopProfile::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'info'           => $request->info,
                'address'        => $request->address,
                'opening_hours'  => $request->opening_hours,
                'established_at' => $request->established_at,
                'sologon'        => $request->sologon,
            ]
        );

        return redirect()->back()->with('success', 'Changes are Saved.');
    }
}
