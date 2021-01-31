<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::where('id_user', auth()->user()->id)->count();
        return view('anggota.dashboard', compact('peminjaman'));
    }

    public function riwayatPinjam()
    {
        $peminjaman = Peminjaman::orderBy('id', 'DESC')->where('id_user', auth()->user()->id)->get();
        return view('anggota.riwayat-pinjam', compact('peminjaman'));
    }

    public function changePassword(Request $request)
    {
        if (!$request->password) {
            return view('anggota.change-password');
        } else {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/anggota')->with('status', 'Sukses Mengganti Password');
        }
    }
}
