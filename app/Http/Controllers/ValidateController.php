<?php

namespace App\Http\Controllers;

use App\Models\AccUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ValidateController extends Controller
{   
    public function editSandi(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);

        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string',
        ]);
        $auth = Auth::users();

        if (!Hash::check($request->get('password'), $auth->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

        if (strcmp($request->get('password'), $request->new_password) == 0) {
            return redirect()->back()->with('error',"New Password cannot be same as your current password.");
        }

        $users = AccUser::find($auth->id);
        $users->password = Hash::make($request->new_password);
        $users->save();
        return back()->with("success","Password Changed Successfully");
    }

    public function editAkun(Request $request)
    {
        // $users = Auth::users();/
        $request->validate([
            'email' => 'nullable',
            'nohp' => 'nullable',
        ]);

        $users = User::find($request->id);
        $users->email = $request->email;
        $users->nohp = $request->nohp;
        $users->save();

        return back();
    }

    public function editProfil(Request $request)
    {


        $request->validate([
            'name' => 'nullable', 
            'gambar' => 'nullable',
        ]);

        if ($request->gambar) {
            $gambarProfile = $request->file('gambar');
            $namaFile = time() . '.' . $gambarProfile->getClientOriginalExtension();
            $gambarProfile->move(public_path('imgprofil'), $namaFile);
        } else {    
            $namaFile = User::find(Auth::user()->id)->gambar;
        }

        $users = User::find(Auth::user()->id);
        $users->name = $request->name;
        $users->gambar = $namaFile ?? $users->gambar;
        $users->save();

        return back();
    }
}