<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTerapi extends Model
{
    use HasFactory;
    
    protected $table = 'mref_jenis_terapi';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_jenis_terapi';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
