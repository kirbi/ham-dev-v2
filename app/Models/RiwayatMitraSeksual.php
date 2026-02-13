<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMitraSeksual extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_riwayat_mitra_seksual';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_riwayat_mitra_seksual';

    
    protected $fillable = [
        'deleted', 'nama', 'umur', 'umur_bulan', 'id_hubungan', 'no_reg_nasional', 'id_status_hiv', 'komsumsi_art', 'id_pasien'
    ];
    
    public function statusHiv(){
        return $this->belongsTo(StatusHiv::class, 'id_status_hiv', 'id_status_hiv');
    }

    public function hubunganMitra(){
        return $this->belongsTo(MitraSeksual::class, 'id_hubungan', 'id_mitra_seksual');
    }
}
