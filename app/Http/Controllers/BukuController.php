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

    public function detail($slug)
    {
        $buku = Buku::where('slug', $slug)->get();
        echo json_encode($buku);
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'pengarang' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg|max:3100'
        ]);

        $pathUpload = 'img/buku/';

        $buku = Buku::where('slug', $request->slug)->first();
        $buku->nama = $request->nama;
        $buku->slug = Str::slug($request->nama) . '-' . date('ymdhis');
        $buku->pengarang = $request->pengarang;
        $buku->deskripsi = $request->deskripsi;

        $currentImage = $buku->gambar;

        if ($request->hasFile('gambar')) {
            if ($currentImage != "noimg.jpg") {
                unlink($pathUpload . $buku->gambar);
            }

            $image = str_replace(" ", "", $request->file('gambar')->getClientOriginalName());

            $nama_file = date('dmYHis') . "_" . $image;

            $request->file('gambar')->move($pathUpload, $nama_file);

            $buku->gambar = $nama_file;
        }

        $buku->save();

        return redirect('/kelola/buku/daftar')->with('status', 'Sukses Edit Data Buku');
    }

    public function delete($slug)
    {
        $pathUpload = 'img/buku/';

        $buku = Buku::where('slug', $slug)->first();

        if ($buku->gambar != "noimg.jpg") {
            unlink($pathUpload . $buku->gambar);
        }

        $buku->delete();
        return redirect('/kelola/buku/daftar')->with('status', 'Sukses Hapus Data Buku');
    }
}
