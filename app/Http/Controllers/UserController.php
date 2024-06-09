<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        
    }

    public function registerStore(Request $request)
    {
        $validasiData = $request->validate([
            'username' => [
                'required',
                'string',
                'min:3',
                'max:20',
                'unique:users',
                'regex:/^[a-zA-Z0-9_]+$/',
            ],
            'password' => [
                'required',
                'min:8',
            ],
        ]);

        $validasiData['password'] = Hash::make($validasiData['password']);

        User::create($validasiData);

        return redirect()->route('login')->with('success', 'Registrasi Berhasil');
    }

    public function login()
    {
        return view('loginRegister');
    }

    public function loginStore(Request $request)
    {
        $validasiData = $request->validate([
            'username' => ['required','string','min:3','max:20','regex:/^[a-zA-Z0-9_]+$/'],
            'password' => ['required','min:8']
        ]);

        if (Auth::attempt($validasiData)) {
            $request->session()->regenerate();
            return redirect()->route('transaction');
        }

        return back()->with('loginErorr', 'Username atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
