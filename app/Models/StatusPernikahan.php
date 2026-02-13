<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPernikahan extends Model
{
    use HasFactory;
    
    protected $table = 'mref_status_pernikahan';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_status_pernikahan';

    
    protected $fillable = [
        'deleted', 'nama',
    ];
}
