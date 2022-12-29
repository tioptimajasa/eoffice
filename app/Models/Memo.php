<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'dari_id',
        'dari_user_id',
        'kepada_id',
        'kepada_user_id',
        'sifat',
        'urgensi',
        'perihal',
        'isi',
        'tanggal',
        'lampiran_memo',
        'status',
        'reff',
        'nomor',
        'nomor_surat',
    ];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }
   
    public function getKeyType()
    {
        return 'string';
    }

}
