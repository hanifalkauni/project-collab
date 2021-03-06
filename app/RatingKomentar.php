<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingKomentar extends Model
{
    protected $table = 'rating_komentar';
    protected $fillable = [
        'user_id',
        'buku_id',
        'rating',
        'komentar'
    ];

    public function buku(){
        return $this->belongsToMany('App\Buku');
    }

    public function user(){
        return $this->belongsToMany('App\User');
    }

}
