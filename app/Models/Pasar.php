<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;
    protected $table = 'pasar';

    protected $fillable = [
        'nama', 
        'alamat', 
        
        'created_by',
        'edited_by',
    ];
}

