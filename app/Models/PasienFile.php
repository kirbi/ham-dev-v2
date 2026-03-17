<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class PasienFile extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'nama', 'path', 'berkas', 'deleted', 'pasien_id'
    ];
}