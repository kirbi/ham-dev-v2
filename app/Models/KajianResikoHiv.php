<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianResikoHiv extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_kajian_resiko_hiv_konseling';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kajian_resiko_hiv';

    
    protected $fillable = [
        'deleted', 'id_konseling', 'tanggal', 'id_tingkat_resiko_hiv'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }

    public function tingkatResiko(){
        return $this->belongsTo(TingkatResikoHiv::class, 'id_tingkat_resiko_hiv', 'id_tingkat_resiko_hiv');
    }
}
