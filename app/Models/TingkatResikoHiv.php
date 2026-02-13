<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatResikoHiv extends Model
{
    use HasFactory;
    
    protected $table = 'mref_tingkat_resiko_hiv';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_tingkat_resiko_hiv';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
