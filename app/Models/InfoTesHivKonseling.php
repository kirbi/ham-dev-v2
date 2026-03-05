<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTesHivKonseling extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_pasien', 'tanggal_tes', 'hasil_tes', 'deleted'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_id');
    }

    public function infoTesHiv(){
        return $this->belongsTo(InfoTesHiv::class, 'info_tes_hiv_id');
    }
}
