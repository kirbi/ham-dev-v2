<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    protected $table = 'hubungan';
    protected $primaryKey = 'id_hubungan';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'deleted',
    ];
}
