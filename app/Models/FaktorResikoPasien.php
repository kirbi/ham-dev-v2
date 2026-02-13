<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktorResikoPasien extends Model
{
    use HasFactory;
    
    protected $table = 'dpha_faktor_resiko_pasien';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_faktor_resiko_pasien';

    
    protected $fillable = [
        'deleted','id_faktor_resiko', 'id_pasien'
    ];
    
    public function faktorResiko(){
        return $this->belongsTo(FaktorResiko::class, 'id_faktor_resiko', 'id_faktor_resiko');
    }

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
}
