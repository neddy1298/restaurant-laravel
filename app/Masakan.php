<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    protected $table = 'tbl_masakans';

    protected $fillable = [
        'id_masakan', 'nama_masakan', 'harga', 'status_masakan',
    ];
}