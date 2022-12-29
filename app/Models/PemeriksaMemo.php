<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaMemo extends Model
{
    protected $fillable = [
        'id',
        'memo_id',
        'user_id',
        'struktur_id',
        'urutan',
    ];
}
