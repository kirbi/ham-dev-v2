<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaktorResiko extends Model
{
    use HasFactory;
    
    protected $table = 'mref_faktor_resiko';

   /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_faktor_resiko';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
