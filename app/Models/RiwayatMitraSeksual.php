<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMitraSeksual extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'nama', 'umur', 'umur_bulan', 'hubungan_id', 'no_reg_nasional', 'status_hiv_id', 'komsumsi_art', 'pasien_id'
    ];
    
    public function statusHiv(){
        return $this->belongsTo(StatusHiv::class, 'status_hiv_id');
    }

    public function hubunganMitra(){
        return $this->belongsTo(MitraSeksual::class, 'hubungan_id');
    }
}
