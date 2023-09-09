<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePhotoRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $addresses = Address::where('customer_id',auth()->id())->get();
        return view('profile.edit', [
            'user' => $request->user(),
            'addresses' => $addresses,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('profile-update-success', 'Profile Updated Successfull!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // custome function
    public function change_profile_photo (ProfilePhotoRequest $request)
    {
        if(auth()->user()->profile_photo){
            unlink(base_path('public/uploads/profile_photos/'.auth()->user()->profile_photo));
        }
        // photo upload start
        $profile_photo = 'Profile_'.date('d_m_Y_').Str::random(5).'.'.$request->file('profile_photo')->getClientOriginalExtension();

        Image::make($request->file('profile_photo'))->save(base_path('public/uploads/profile_photos/'.$profile_photo));
        // photo upload end

        // update
        User::find(auth()->user()->id)->update([
            'profile_photo' => $profile_photo,
        ]);
        return back()->with('photo-success', 'New Photo Upload Successfull!');
    }
}
