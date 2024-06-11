<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konfigurasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'created_by',
        'edited_by',
        'created_at',
        'edited_at',
    ];
}
