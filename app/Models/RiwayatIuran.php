<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatIuran extends Model
{
    use HasFactory;

    protected $table = 'riwayat_iuran';

    protected $fillable = [
        'id_tenant',
        'tahun_bulan',
        'jml_bayar',
        'tgl_bayar',
        'created_by',
        'edited_by'
    ];
}
