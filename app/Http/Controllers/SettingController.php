<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function changepassword()
    {
        return view('setting.index');
    }

    public function newpasswordSave(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' =>'required|same:new_password'
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->back()->with('message', 'Password changed successfully.');
        }

        return back()->withErrors(['current_password' => 'Incorrect current password.']);


    }
}
