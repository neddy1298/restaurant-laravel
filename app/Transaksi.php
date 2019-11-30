<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tbl_transaksis';

    protected $fillable = [
        'id_transaksi', 'id_user', 'id_order', 'tanggal', 'total_bayar',
    ];
}