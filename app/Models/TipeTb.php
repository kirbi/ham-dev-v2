<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeTb extends Model
{
    use HasFactory;
    
    protected $table = 'mref_tipe_tb';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_tipe_tb';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
