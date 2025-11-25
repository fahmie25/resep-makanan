<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('status', 'Email atau Password salah!');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * HALAMAN PILIHAN PENDAFTARAN (Google / Email)
     */
    public function showRegisterChoice()
    {
        return view('register-choice');
    }

    /**
     * FORM REGISTER VIA EMAIL
     */
    public function showRegisterForm()
    {
        return view('register-email');
    }

    /**
     * PROSES REGISTER VIA EMAIL
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * GOOGLE LOGIN - Redirect ke Google
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * GOOGLE LOGIN - Callback dari Google
     */
    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('status', 'Gagal login dengan Google.');
        }

        // Jika email sudah ada, login user tsb
        $user = User::where('email', $googleUser->getEmail())->first();

        // Jika belum ada, buat user
        if (! $user) {
            $user = User::create([
                'name'     => $googleUser->getName(),
                'email'    => $googleUser->getEmail(),
                'password' => Hash::make(str()->random(16)),
            ]);
        }

        Auth::login($user);
        return redirect()->route('home');
    }
}

