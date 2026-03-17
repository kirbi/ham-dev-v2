<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianResikoHiv extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'konseling_hiv_id', 'tanggal', 'tingkat_resiko_hiv_id'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_hiv_id');
    }

    public function tingkatResiko(){
        return $this->belongsTo(TingkatResikoHiv::class, 'tingkat_resiko_hiv_id');
    }
}
