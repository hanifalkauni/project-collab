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

    public function detailBuku(){
        return $this->hasMany('App\DetailBuku');
    }

    public function kategori(){
        return $this->belongsToMany('App\Kategori');
    }

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
