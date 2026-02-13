<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHiv extends Model
{
    use HasFactory;
    
    protected $table = 'mref_status_hiv';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_status_hiv';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
