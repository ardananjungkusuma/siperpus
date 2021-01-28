<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = ['id', 'id_user', 'nama_buku', 'tanggal_pinjam', 'tanggal_kembali', 'denda', 'status_pinjaman'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
