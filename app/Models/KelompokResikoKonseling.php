<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokResikoKonseling extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'konseling_hiv_id', 'lama_tahun', 'lama_bulan', 'kelompok_resiko_id'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_hiv_id');
    }

    public function kelompokResiko(){
        return $this->belongsTo(KelompokResiko::class, 'kelompok_resiko_id');
    }
}
