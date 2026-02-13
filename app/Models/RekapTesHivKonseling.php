<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapTesHivKonseling extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_rekap_tes_hiv_konseling';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_rekap_tes_hiv_konseling';

    
    protected $fillable = [
        'deleted', 'id_konseling', 'tempat_tes', 'tanggal', 'hasil'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'id_konseling_hiv', 'id_konseling');
    }
}
