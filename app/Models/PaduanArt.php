<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaduanArt extends Model
{
    use HasFactory;
    
    protected $table = 'mref_paduan_art';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_paduan_art';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
