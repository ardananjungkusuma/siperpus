<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage.index');
    }

    public function katalogBuku(Request $request)
    {
        if (!$request->search) {
            $buku = Buku::orderBy('nama', 'asc')->paginate(12);
        } else {
            $buku = Buku::where('nama', 'like', '%' . $request->search . '%')->orderBy('nama', 'asc')->paginate(12);
        }
        return view('homepage.katalog-buku', compact('buku'));
    }

    public function detailBuku($slug)
    {
        $buku = Buku::where('slug', $slug)->get()->first();
        return view('homepage.detail-buku', compact('buku'));
    }
}
