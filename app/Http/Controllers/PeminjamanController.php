<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $peminjaman = Peminjaman::orderBy('id', 'DESC')->get();
        $buku = Buku::orderBy('nama')->get();
        $user = User::role('anggota')->where('status_user', 'Aktif')->orderBy('name')->get();

        return view('peminjaman.daftar-peminjaman', compact('peminjaman', 'buku', 'user'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama_buku' => 'required',
            'id_user' => 'required',
        ]);


        $today = date('Y-m-d');
        $max_pengembalian = date('Y-m-d', strtotime("+7 day", strtotime($today)));
        $peminjaman = new Peminjaman;
        $peminjaman->id_user = $request->id_user;
        $peminjaman->nama_buku = $request->nama_buku;
        $peminjaman->tanggal_pinjam = $today;
        $peminjaman->tanggal_maks_pengembalian = $max_pengembalian;

        $peminjaman->save();

        return redirect('/kelola/peminjaman/daftar')->with('status', 'Sukses Menambah Data Peminjaman');
    }

    public function detail($id)
    {
        $peminjaman = Peminjaman::find($id);
        echo json_encode($peminjaman);
    }

    public function pengembalian(Request $request)
    {
        $peminjaman = Peminjaman::find($request->id);
        $peminjaman->tanggal_kembali = date('Y-m-d');
        $peminjaman->denda = $request->denda;
        if ($request->denda > 0) {
            $peminjaman->status_peminjaman = "Sudah Dikembalikan (Terlambat)";
        } else {
            $peminjaman->status_peminjaman = "Sudah Dikembalikan";
        }
        $peminjaman->save();

        return redirect('/kelola/peminjaman/daftar')->with('status', 'Sukses Mengembalikan Buku');
    }

    public function delete($id)
    {
        Peminjaman::find($id)->delete();
        return redirect('/kelola/peminjaman/daftar')->with('status', 'Sukses Hapus Data Peminjaman');
    }
}
