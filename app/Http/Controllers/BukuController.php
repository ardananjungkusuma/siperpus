<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('nama')->get();
        return view('buku.daftar-buku', compact('buku'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg|max:3100'
        ]);

        $pathUpload = 'img/buku';

        $buku = new Buku;
        $buku->nama = $request->nama;
        $buku->slug = Str::slug($request->nama) . '-' . date('ymdhis');
        $buku->pengarang = $request->pengarang;
        $buku->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $image = str_replace(" ", "", $request->file('gambar')->getClientOriginalName());

            $nama_file = date('dmYHis') . "_" . $image;

            $request->file('gambar')->move($pathUpload, $nama_file);

            $buku->gambar = $nama_file;
        } else {
            $buku->gambar = "noimg.jpg";
        }

        $buku->save();

        return redirect('/kelola/buku/daftar')->with('status', 'Sukses Menambah Data Buku');
    }
}
