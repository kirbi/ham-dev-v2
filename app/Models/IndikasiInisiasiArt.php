<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikasiInisiasiArt extends Model
{
    use HasFactory;
    
    protected $table = 'mref_indikasi_inisiasi_art';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_iiart';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
