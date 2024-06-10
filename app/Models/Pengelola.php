<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    use HasFactory;
    protected $table = 'pengelola';

    protected $fillable = [
        'id_user', 
        'id_pasar', 
        'created_by',
        'edited_by',
    ];
}
