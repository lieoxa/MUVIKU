<?php

namespace App\Http\Controllers;

// use App\Models\AccUser;
use App\Models\User;
use App\Models\AccAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nohp' => 'required|string|max:20',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Kolom nama wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'nohp.required' => 'Kolom nomor HP wajib diisi.',
            'password.required' => 'Kolom sandi wajib diisi.',
            'password.min' => 'Panjang sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi sandi tidak cocok.',
        ]);

        // Buat instance User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->password = Hash::make($request->password);

        // Simpan user ke database
        $user->save();

        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetails = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetails)) {
            if(Auth::user()?->status == 'block'){
                Auth::logout();
                return back()->with('error', 'Maaf, Akun Anda telah di nonaktifkan !');
            }
            return redirect('utama')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email atau Sandi salah');
    }

    public function getAdmin()
    {
        return view('admin.login.login');
    }

    public function postAdmin(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'password' => 'required',
        ]);

        // dd($request);

        $get_admin = AccAdmin::whereName($request->name)->first();


        if (Auth::guard('acc_admin')->attempt(['name' => $request->name, 'password' => $request->password])) {
            // dd(Auth::user());
            return redirect('/admin/dashboard')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email atau Sandi salah');
    }

    public function search()
    {
        return view('user.search');
    }

    public function favorit()
    {
        return view('user.favorit');
    }

    public function watchlist()
    {
        return view('user.watchlist');
    }
    public function profile()
    {
        $users = Auth::user();
        return view('user.profile', compact('users'));
    }

    public function logoutLogin()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/adminlog');
    }
}