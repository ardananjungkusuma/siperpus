<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::count();
        $peminjaman_belum_dikembalikan = Peminjaman::where('status_peminjaman', 'Belum Dikembalikan')->count();
        $peminjaman_sudah_dikembalikan = Peminjaman::where('status_peminjaman', '!=', 'Belum Dikembalikan')->count();
        return view('pegawai.dashboard', compact('peminjaman', 'peminjaman_belum_dikembalikan', 'peminjaman_sudah_dikembalikan'));
    }

    public function daftarAnggota()
    {
        $anggota = User::role('anggota')->orderBy('name')->get();
        return view('pegawai.daftar-anggota', compact('anggota'));
    }

    public function statusAnggota($status, $id)
    {
        $anggota = User::find($id);
        $nama = $anggota->name;
        if ($status == "aktifkan") {
            $anggota->status_user = "Aktif";
        } else if ($status == "nonaktifkan") {
            $anggota->status_user = "Dinonaktifkan";
        }
        $anggota->save();

        return redirect('/kelola/anggota/daftar')->with('status', 'Sukses Mengedit Status Anggota ' . $nama);
    }

    public function changePassword(Request $request)
    {
        if (!$request->password) {
            return view('pegawai.change-password');
        } else {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);

            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('/pegawai')->with('status', 'Sukses Mengganti Password');
        }
    }
}
