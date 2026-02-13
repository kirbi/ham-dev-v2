<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class PasienFile extends Model
{
    use HasFactory;
    protected $table ='dpha_pasien_file';
    protected $primaryKey = 'id_file';

  
    protected $fillable = [
        'nama', 'path', 'berkas', 'deleted', 'id_pasien'
    ];
}