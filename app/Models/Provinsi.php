<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    
    protected $table = 'mref_provinsi';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_provinsi';

    
    protected $fillable = [
        'deleted', 'nama'
    ];
       
    public function kabupaten(){
        return $this->hasMany(Kabupaten::class, 'id_provinsi', 'id_provinsi');
    }
}
