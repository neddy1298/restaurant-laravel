<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_orders';

    protected $fillable = [
        'id_order', 'no_meja', 'tanggal', 'id_user', 'keterangan', 'status_order',
    ];
}
