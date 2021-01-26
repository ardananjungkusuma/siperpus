<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::get();
        $buku = Buku::orderBy('nama')->get();
        $user = User::role('anggota')->where('status_user', 'Aktif')->orderBy('name')->get();

        return view('peminjaman.daftar-peminjaman', compact('peminjaman', 'buku', 'user'));
    }
}
