<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'trkrs';
    protected $fillable = [
        'CKDFAK',
        'CTHAJAR',
        'CSMT',
        'CNOTAB',
        'CKELOMPOK',
        'CNIM'
    ];
}
