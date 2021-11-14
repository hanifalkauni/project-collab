<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'kategori_id',
        'user_id',
        'tahun',
        'penulis'
    ];
}
