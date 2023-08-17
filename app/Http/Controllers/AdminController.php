<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Mail\NotifyAdmin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function add_new_admin()
    {
        $admins = User::withTrashed()->where('role','Admin')->get();
        return view('backend.admin.add_new_admin',compact('admins'));
    }

    public function add_new_admin_post (AdminPostRequest $request)
    {
        $random_password = Str::upper(Str::random(8));
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($random_password),
            'created_at' => Carbon::now(),
            'role' => 'Admin',
        ]);
        Mail::to($request->email)->send(new NotifyAdmin($request->name,$request->email,$random_password));
        return back()->with('admin-success','Now send an email to new admin');
    }

    public function admin_deactive ($id)
    {
        User::find($id)->delete();
        return back();
    }

    public function admin_active ($id)
    {
        User::withTrashed()->where('id',$id)->restore();
        return back();
    }

    public function admin_delete ($id)
    {
        User::where('id',$id)->forceDelete();
        return back();
    }

}
