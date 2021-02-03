<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = ['id', 'judul', 'slug', 'isi', 'gambar_header'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
