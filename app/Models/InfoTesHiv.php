<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTesHiv extends Model
{
    use HasFactory;
    
    protected $table = 'mref_info_tes_hiv';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_info_tes_hiv';

    
    protected $fillable = [
        'deleted', 'nama'
    ];
}
