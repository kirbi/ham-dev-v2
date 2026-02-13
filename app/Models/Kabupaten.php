<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    
    protected $table = 'mref_kabupaten';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kabupaten';

    
    protected $fillable = [
        'deleted', 'nama', 'id_provinsi'
    ];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id_provinsi');
    }

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'id_kabupaten', 'id_kabupaten');
    }

}
