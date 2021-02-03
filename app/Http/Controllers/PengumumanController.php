<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'DESC')->get();
        return view('pengumuman.daftar-pengumuman', compact('pengumuman'));
    }

    public function tambah(Request $request)
    {
        if (!$request->judul) {
            return view('pengumuman.tambah-pengumuman');
        } else {
            $this->validate($request, [
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'mimes:jpg,png,jpeg|max:3100'
            ]);

            $pathUpload = 'img/pengumuman';

            $pengumuman = new Pengumuman;
            $pengumuman->id_user = auth()->user()->id;
            $pengumuman->judul = $request->judul;
            $pengumuman->slug = Str::slug($request->judul) . '-' . date('ymdhis');
            $pengumuman->isi = $request->isi;

            if ($request->hasFile('gambar')) {
                $image = str_replace(" ", "", $request->file('gambar')->getClientOriginalName());

                $nama_file = date('dmYHis') . "_" . $image;

                $request->file('gambar')->move($pathUpload, $nama_file);

                $pengumuman->gambar_header = $nama_file;
            } else {
                $pengumuman->gambar_header = "noimg.jpg";
            }

            $pengumuman->save();

            return redirect('/kelola/pengumuman/daftar')->with('status', 'Sukses Menambah Pengumuman');
        }
    }

    public function edit(Request $request, $slug = null)
    {
        if (!$request->judul) {
            $pengumuman = Pengumuman::where('slug', $slug)->get()->first();

            return view('pengumuman.edit-pengumuman', compact('pengumuman'));
        } else {
            $this->validate($request, [
                'judul' => 'required',
                'isi' => 'required',
                'gambar' => 'mimes:jpg,png,jpeg|max:3100'
            ]);

            $pathUpload = 'img/pengumuman/';

            $pengumuman = Pengumuman::find($request->id);
            $pengumuman->id_user = auth()->user()->id;
            $pengumuman->judul = $request->judul;
            $pengumuman->slug = Str::slug($request->judul) . '-' . date('ymdhis');
            $pengumuman->isi = $request->isi;

            $currentImage = $pengumuman->gambar_header;

            if ($request->hasFile('gambar')) {
                if ($currentImage != "noimg.jpg") {
                    unlink($pathUpload . $pengumuman->gambar_header);
                }
                $image = str_replace(" ", "", $request->file('gambar')->getClientOriginalName());

                $nama_file = date('dmYHis') . "_" . $image;

                $request->file('gambar')->move($pathUpload, $nama_file);

                $pengumuman->gambar_header = $nama_file;
            }

            $pengumuman->save();

            return redirect('/kelola/pengumuman/daftar')->with('status', 'Sukses Mengedit Pengumuman');
        }
    }

    public function detail($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->get()->first();

        return view('pengumuman.detail-pengumuman', compact('pengumuman'));
    }

    public function delete($slug)
    {
        $pathUpload = 'img/pengumuman/';

        $pengumuman = Pengumuman::where('slug', $slug)->first();

        if ($pengumuman->gambar_header != "noimg.jpg") {
            unlink($pathUpload . $pengumuman->gambar_header);
        }

        $pengumuman->delete();
        return redirect('/kelola/pengumuman/daftar')->with('status', 'Sukses Hapus Pengumuman');
    }
}
