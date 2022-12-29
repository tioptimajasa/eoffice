<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesAkses extends Model
{
    use HasFactory;
    protected $table = 'roles_aksess';
    protected $fillable = [
        'id',
        'struktur_id',
        'role',
    ];
    public function getRouteKeyName()
    {
        return 'uuid';
    }
   
    public function getKeyType()
    {
        return 'string';
    }
}
