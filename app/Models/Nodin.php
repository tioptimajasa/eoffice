<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Struktur;
use App\Models\Approval;

class Nodin extends Model
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
        'lampiran_nodin',
        'status',
        'reff',
        'nomor',
        'nomor_surat',
        'nomor_approval',
        'created_by',
        'updated_by'
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
 
    public function dari()
    {
        return $this->belongsTo(Struktur::class,'dari_id', 'id');
    }
    public function kepada()
    {
        return $this->belongsTo(Struktur::class,'kepada_id', 'id');
    }
    public function data_approval()
    {
        return $this->hasMany(Approval::class,'id','nomor_approval');
    }
    public function dari_user()
    {
        return $this->belongsTo(User::class,'dari_user_id', 'id');
    }   
    public function kepada_user()
    {
        return $this->belongsTo(User::class,'kepada_user_id', 'id');
    }   
   
}
