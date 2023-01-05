<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryApproval extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
   
    protected $fillable = [
        'id',
        'approval_id',
        'struktur_id',
        'user_id',
        'status',
        'keterangan'
    ];
}
