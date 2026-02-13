<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTesHivKonseling extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_info_tes_hiv_konseling';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_info_tes_hiv_konseling';

    
    protected $fillable = [
        'deleted', 'id_konseling', 'id_info_tes_hiv'
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class, 'id_konseling', 'id_konseling');
    }

    public function infoTesHiv(){
        return $this->belongsTo(InfoTesHiv::class, 'id_info_tes_hiv', 'id_info_tes_hiv');
    }
}
