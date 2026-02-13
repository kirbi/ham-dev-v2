<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlasanSubstitusi extends Model
{
    use HasFactory;
    
    protected $table = 'mref_alasan_substitusi';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_alasan_substitusi';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
