<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapTesHivKonseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 'tanggal_tes', 'hasil_tes', 'deleted'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'konseling_id');
    }
}
