<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapTesHivKonseling extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        'deleted', 'konseling_hiv_id', 'tempat_tes', 'tanggal', 'hasil'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_hiv_id');
    }
}
