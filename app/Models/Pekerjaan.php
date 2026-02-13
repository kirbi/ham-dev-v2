<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    
    protected $table = 'mref_pekerjaan';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_pekerjaan';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];

    public function pasiens(){
        return $this->hasMany(Pasien::class);
    }
}
