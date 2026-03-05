<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama', 'email', 'no_telepon', 'alamat', 'deleted'
    ];
    
    public function pasiens(){
        return $this->hasMany(Pasien::class, 'konselor_id');
    }
    
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
    
    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'status_pernikahan_id');
    }
}
