<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    
    protected $table = 'mref_kecamatan';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_kecamatan';

    
    protected $fillable = [
        'deleted', 'nama', 'id_kecamatan', 'id_kabupaten'
    ];
    
    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id_kabupaten');
    }
        
    public function desa(){
        return $this->hasMany(Desa::class, 'id_kecamatan', 'id_kecamatan');
    }
}
