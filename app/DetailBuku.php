<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBuku extends Model
{
    protected $table = "detail_buku";
    protected $fillable = [
        'buku_id',
        'nama_asli_penulis',
        'bio_penulis',
        'sinopsis'
    ];

    public function buku(){
        return $this->belongsTo('App\Buku');
    }
}
