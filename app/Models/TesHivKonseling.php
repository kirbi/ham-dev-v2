<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesHivKonseling extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'deleted', 'id_konseling', 'tes_r1', 'tes_r2', 'tes_r3', 'reagen_r1', 'reagen_r2', 'reagen_r3', 'jenis_tes', 'tanggal_tes', 'hasil'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_id');
    }
}
