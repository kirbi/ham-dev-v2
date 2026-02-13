<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EfekSamping extends Model
{
    use HasFactory;
    
    protected $table = 'mref_efek_samping';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_efek_samping';

    
    protected $fillable = [
        'deleted', 'kode', 'nama', 'deskripsi'
    ];
}
