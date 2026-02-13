<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;
    
    protected $table = 'mref_jenis_kelamin';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_jenis_kelamin';

    
    protected $fillable = [
        'deleted', 'inisial', 'deskripsi'
    ];
}
