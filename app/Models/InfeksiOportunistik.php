<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfeksiOportunistik extends Model
{
    use HasFactory;
    
    protected $table = 'mref_infeksi_oportunistik';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_infeksi_oportunistik';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi', 'kode'
    ];
}
