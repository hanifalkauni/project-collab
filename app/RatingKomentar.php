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
}
