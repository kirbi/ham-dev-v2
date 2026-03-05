<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTb extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'deleted'
    ];

    // Relationships remain unchanged
}
