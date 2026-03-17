<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'email',
        'nama',
        'alamat',
        'no_hp',
        'nik',
        'nip',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan_id',
        'tanggal_sertifikasi',
        'status_pegawai',
        'status_pernikahan_id'
    ];
    
    public function pasiens(){
        return $this->hasMany(Pasien::class);
    }
    
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'pendidikan_id');
    }
    
    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'status_pernikahan_id');
    }
}
