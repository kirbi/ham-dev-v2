<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdherenceArt extends Model
{
    use HasFactory;
    
    protected $table = 'mref_adherence_art';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_adherence_art';
    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
    
}
