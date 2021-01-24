<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            if ($user->hasRole('admin') or $user->hasRole('pegawai')) {
                return redirect('/pegawai');
            } else if ($user->hasRole('anggota')) {
                return redirect('/anggota');
            }
        } else {
            return redirect('/auth/login')->with('status', 'Invalid Email or Password!');
        }
    }

    public function registerAnggota()
    {
        return view('auth.register-anggota');
    }

    public function postRegisterAnggota(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'alamat' => 'required|min:5|max:100',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $user->assignRole('anggota');

        return redirect('/auth/login')->with('status', 'Anda sukses registrasi');
        // TODO TEST REGISTER USER
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/auth/login');
    }
}
