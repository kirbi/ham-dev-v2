<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaduanTb extends Model
{
    use HasFactory;
    
    protected $table = 'mref_paduan_tb';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_paduan_tb';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
