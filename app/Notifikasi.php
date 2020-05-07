<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    //
    protected $table = 'notifikasi';

    protected $fillable = [
        'headline', 'isi', 'penulis'
    ];

}
