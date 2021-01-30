<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.dashboard');
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
}
