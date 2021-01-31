<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function daftarPegawai()
    {
        $users = User::with('roles')->where('id', '!=', auth()->id())->orderBy('name')->get();
        $pegawai = $users->reject(function ($user, $key) {
            return $user->hasAnyRole('anggota', 'admin');
        });
        $admin = User::role(['admin'])->where('id', '!=', auth()->id())->get();

        return view('admin.daftar-pegawai', compact('pegawai', 'admin'));
    }

    public function tambahPegawai(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'alamat' => 'required|min:5|max:100',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|numeric',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->password = bcrypt('pegawai123');
        $user->status_user = 'Aktif';
        $user->remember_token = Str::random(60);
        $user->save();

        $user->assignRole('pegawai');

        return redirect('/kelola/pegawai/daftar')->with('status', 'Sukses tambah data pegawai! Password default pegawai adalah pegawai123, segera ganti password tersebut!');
    }

    public function hapusPegawai($id)
    {
        $user = User::find($id);
        $user->removeRole('pegawai');
        $user->delete();

        return redirect('/kelola/pegawai/daftar')->with('status', 'Sukses Hapus Data Pegawai');
    }

    public function setAdminPegawai($id)
    {
        $user = User::find($id);
        $user->assignRole('admin');

        return redirect('/kelola/pegawai/daftar')->with('status', 'Sukses Menjadikan' . $user->name . ' Sebagai Admin');
    }
}
