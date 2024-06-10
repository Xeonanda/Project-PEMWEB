<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_pemilikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tenant',
        'tgl_transaksi',
        'id_pemilik_lama',
        'id_pemilik_baru',
        'created_by',
        'edited_by'
    ];
}
