<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoTesHiv extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pasien', 'tanggal_tes', 'hasil_tes', 'deleted'
    ];

    // Relationships remain unchanged
}
