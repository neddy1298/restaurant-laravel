<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Order extends Model
{
    protected $table = 'tbl_detail_order';

    protected $fillable = [
        'id_detail_order', 'id_order', 'id_masakan', 'keterangan', 'status_detail_order',
    ];
}