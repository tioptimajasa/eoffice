<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nodin;
use App\Models\HistoryApproval;
use App\Models\SequenceApproval;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class Approval extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'struktur_id',
        'user_id',
        'status',
    ];
    public function getRouteKeyName()
    {
        return 'uuid';
    }
   
    public function getKeyType()
    {
        return 'string';
    }
    public function approval_nodin()
    {
        return $this->belongsTo(Nodin::class,'nomor_approval', 'id');
    }

}
