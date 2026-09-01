<?php

namespace App\Http\Controllers;

// use App\Models\AccUser;
use App\Models\User;
use App\Models\AccAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Check if user already exists with google_id
            $user = User::where('google_id', $googleUser->id)->first();
            
            if (!$user) {
                // Check if user already exists with email
                $user = User::where('email', $googleUser->email)->first();
                
                if ($user) {
                    // Update user with google_id and avatar if empty
                    $user->update([
                        'google_id' => $googleUser->id,
                        'gambar' => $user->gambar ?: $googleUser->avatar,
                    ]);
                } else {
                    // Create a new user
                    $user = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'nohp' => '', // Default value since it's nullable
                        'password' => Hash::make(Str::random(24)), // Generate random secure password
                        'gambar' => $googleUser->avatar,
                    ]);
                }
            } else {
                // If user exists with google_id, update avatar if empty
                if (empty($user->gambar)) {
                    $user->update([
                        'gambar' => $googleUser->avatar,
                    ]);
                }
            }
            
            if ($user->status == 'block') {
                return redirect()->route('login')->with('error', 'Maaf, Akun Anda telah di nonaktifkan !');
            }
            
            Auth::login($user);
            return redirect('utama')->with('success', 'Login berhasil');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat masuk menggunakan Google. Silakan coba lagi.');
        }
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
            return redirect('/user')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email atau Sandi salah');
    }

    public function search()
    {
        return view('user.search');
    }

    public function favorit()
    {
        $films = \App\Models\Film::where('is_publish', '1')->inRandomOrder()->take(8)->get();
        return view('user.favorit', compact('films'));
    }

    public function watchlist()
    {
        $films = \App\Models\Film::where('is_publish', '1')->latest()->take(8)->get();
        return view('user.watchlist', compact('films'));
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