<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTesHivKonseling extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'konseling_hiv_id', 'info_tes_hiv_id'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_hiv_id');
    }

    public function infoTesHiv(){
        return $this->belongsTo(InfoTesHiv::class, 'info_tes_hiv_id');
    }
}
