<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiTb extends Model
{
    use HasFactory;
    
    protected $table = 'mref_klasifikasi_tb';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_klasifikasi_tb';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
