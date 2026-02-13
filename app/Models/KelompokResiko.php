<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokResiko extends Model
{
    use HasFactory;
    
    protected $table = 'mref_kelompok_resiko';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kelompok_resiko';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
