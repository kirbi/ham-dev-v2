<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryPoint extends Model
{
    use HasFactory;
    
    protected $table = 'mref_entry_point';

   /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'id_entry_point';

    
    protected $fillable = [
        'deleted', 'nama', 'deskripsi'
    ];
}
