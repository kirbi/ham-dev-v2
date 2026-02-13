<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPemeriksaan extends Model
{
    use HasFactory;
    
    protected $table = 'mref_kategori_pemeriksaan';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kategori_pemeriksaan';

    
    protected $fillable = [
        'deleted', 'nama', 'urutan', 'deskripsi'
    ];
}
