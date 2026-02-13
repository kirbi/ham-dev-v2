<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_konselor';
    protected $primaryKey = 'id_konselor';

    
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
        'id_pendidikan',
        'tanggal_sertifikasi',
        'status_pegawai',
        'id_status_pernikahan'
    ];
    
    public function pasiens(){
        return $this->hasMany(Pasien::class);
    }
    
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan', 'id_pendidikan');
    }
    
    public function statusPernikahan(){
        return $this->belongsTo(StatusPernikahan::class, 'id_status_pernikahan', 'id_status_pernikahan');
    }
}
