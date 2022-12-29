<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaNodin extends Model
{
    use HasFactory;
    protected $table = 'pemeriksa_nodins';
   
    protected $fillable = [
        'id',
        'nodin_id',
        'user_id',
        'struktur_id',
        'urutan',
    ];
}
