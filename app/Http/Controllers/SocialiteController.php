<?php

namespace App\Http\Controllers;

use App\Mail\GoogleRegisterUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SocialiteController extends Controller
{
    // google start //

    public function google_redirect ()
    {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback ()
    {
        $user = Socialite::driver('google')->user();

        if(User::where('email',$user->getEmail())->exists()){
            Auth::login(User::where('email',$user->getEmail())->first());

            return redirect('dashboard');
        }else{
            $random_password = Str::upper(Str::random(8));
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($random_password),
                'created_at' => Carbon::now(),
            ]);
            if (Auth::attempt(['email' => $user->getEmail(), 'password' => $random_password])) {

                // sending mail google register -> email & password
                Mail::to($user->getEmail())->send(new GoogleRegisterUser($user->getName(),$user->getEmail(),$random_password));

                return redirect('dashboard');
            }else{
                return "Something Wrong!!";
            }
        }
    }

    // google end //

    // github start //

    public function github_redirect ()
    {
        return Socialite::driver('github')->redirect();
    }
    public function github_callback ()
    {
        $user = Socialite::driver('github')->user();

        if(User::where('email',$user->getEmail())->exists()){
            Auth::login(User::where('email',$user->getEmail())->first());

            return redirect('dashboard');
        }else{
            $random_password = Str::upper(Str::random(8));
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($random_password),
                'created_at' => Carbon::now(),
            ]);
            if (Auth::attempt(['email' => $user->getEmail(), 'password' => $random_password])) {

                // sending mail google register -> email & password
                Mail::to($user->getEmail())->send(new GoogleRegisterUser($user->getName(),$user->getEmail(),$random_password));

                return redirect('dashboard');
            }else{
                return "Something Wrong!!";
            }
        }
    }
    // github end //

    // linkedIn start //

    public function linkedin_redirect ()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function linkedin_callback ()
    {
        $user = Socialite::driver('linkedin')->user();

        if(User::where('email',$user->getEmail())->exists()){
            Auth::login(User::where('email',$user->getEmail())->first());

            return redirect('dashboard');
        }else{
            $random_password = Str::upper(Str::random(8));
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make($random_password),
                'created_at' => Carbon::now(),
            ]);
            if (Auth::attempt(['email' => $user->getEmail(), 'password' => $random_password])) {

                // sending mail google register -> email & password
                Mail::to($user->getEmail())->send(new GoogleRegisterUser($user->getName(),$user->getEmail(),$random_password));

                return redirect('dashboard');
            }else{
                return "Something Wrong!!";
            }
        }
    }
    // github end //
}
