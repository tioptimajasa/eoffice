<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriApprovalNodin extends Model
{
    use HasFactory;
    protected $table = 'history_approval_nodins';
    protected $fillable = [
        'id',
        'pemeriksa_nodin_id',
        'keterangan',
        'status',
    ];
}
