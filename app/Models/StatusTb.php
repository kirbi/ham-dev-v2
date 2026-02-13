<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTb extends Model
{
    use HasFactory;
    
    protected $table = 'mref_status_tb';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_status_tb';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
