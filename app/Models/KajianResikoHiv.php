<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianResikoHiv extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'pasien_id', 'faktor_resiko_id', 'deskripsi', 'deleted'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_id');
    }

    public function tingkatResiko(){
        return $this->belongsTo(TingkatResikoHiv::class, 'tingkat_resiko_hiv_id');
    }
}
