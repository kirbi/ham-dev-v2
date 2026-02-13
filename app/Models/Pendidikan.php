<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    
    protected $table = 'mref_pendidikan';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_pendidikan';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
