<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusFungsional extends Model
{
    use HasFactory;
    
    protected $table = 'mref_status_fungsional';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_status_fungsional';

    
    protected $fillable = [
        'deleted', 'kode', 'nama', 'deskripsi'
    ];
}
