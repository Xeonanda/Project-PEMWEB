<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenant extends Model
{
    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'id_pasar');
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik');
    }
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_pemilik',
        'latitude_tenant',
        'longitude_tenant',
        'harga_iuran',
        'id_pasar',
        'created_by',
        'edited_by',
    ];
}
