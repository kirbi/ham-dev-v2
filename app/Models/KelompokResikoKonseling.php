<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokResikoKonseling extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_kelompok_resiko_konseling';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kelompok_resiko_konseling';

    
    protected $fillable = [
        'deleted', 'id_konseling', 'lama_tahun', 'lama_bulan', 'id_kelompok_resiko'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'id_konseling_hiv', 'id_konseling');
    }

    public function kelompokResiko(){
        return $this->belongsTo(KelompokResiko::class, 'id_kelompok_resiko', 'id_kelompok_resiko');
    }
}
