<?php

namespace App\Http\Controllers;

use App\Models\AccUser;
use App\Models\Laporan;
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
            'new_password' => 'required|min:8',
            'new_password_confirmation' => 'required|same:new_password'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Password Tidak Sama'], 422);
        }

        if (strcmp($request->password, $request->new_password) == 0) {
            return response()->json(['error' => 'Sandi Baru Tidak Sama Dengan Password Kamu.'], 422);
        }

        $user = AccUser::find($user->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => 'Password Berhasil Dirubah']);

    }

    public function editAkun(Request $request)
    {
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

    public function kirimLaporan(Request $request)
    {
        $request->validate([
            'laporan' => 'required'
        ]);

        $user = Auth::user();

        Laporan::create([

            'name' => $user->name,
            'laporan' => $request->laporan,
            'lokasi' => 'Profil',
        ]);
        
        return back();
    }
}