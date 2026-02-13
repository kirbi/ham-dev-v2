<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraSeksual extends Model
{
    use HasFactory;
    
    protected $table = 'mref_mitra_seksual';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_mitra_seksual';

    
    protected $fillable = [
        'deleted', 'nama'
    ];
}
