<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], ['required' => ':attribute wajib diisi.']);

        // Logika sederhana: username dan password sama = berhasil
        if ($request->username === $request->password) {
            return redirect()->route('dashboard')
                ->with('success', 'Login berhasil. Selamat datang, ' . $request->username . '.');
        }

        return redirect()->route('login')
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah.');
    }

    public function showRegister()
    {
        return view('guest.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], ['required' => ':attribute wajib diisi.']);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}