<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'tbl_levels';

    protected $fillable = [
        'id_level', 'nama_level'
    ];
}
