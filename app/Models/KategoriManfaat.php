<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriManfaat extends Model
{
    use HasFactory;
    
    protected $table = 'mref_kategori_manfaat';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kategori_manfaat';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
