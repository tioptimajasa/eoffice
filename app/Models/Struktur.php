<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Nodin;

class Struktur extends Model
{
    protected $fillable = [
        'id',
        'nama_organisasi',
        'jabatan',
        'parent_id',
        'kategori',
        'patern_memo',
        'patern_nota',
        'patern_surat',
    ];
  
    /**
     * Get the user associated with the Struktur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function children()
    {
        return $this->hasMany(Struktur::class, 'parent_id');
    }
    
    public function parent()
    {
        return $this->belongsTo(Struktur::class, 'parent_id');
    }
  
 
//    public function nodin()
//    {
//        return $this->hasMany(Nodin::class);
//    }   
    
}
