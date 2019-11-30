<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_masakans';

    protected $fillable = [
        'id_order', 'no_meja', 'tanggal', 'id_user', 'keterangan', 'status_order',
    ];
}