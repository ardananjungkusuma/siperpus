<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = ['id', 'nama', 'slug', 'pengarang', 'deskripsi', 'gambar'];
}
