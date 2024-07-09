<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_pemilikan extends Model
{
    use HasFactory;
    public function pemilikLama()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik_lama');
    }

    public function pemilikBaru()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik_baru');
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'id_tenant');
    }
    protected $fillable = [
        'id_tenant',
        'tgl_transaksi',
        'id_pemilik_lama',
        'id_pemilik_baru',
        'created_by',
        'edited_by'
    ];
}
