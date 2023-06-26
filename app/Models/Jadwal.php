<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'tjadkul';
    protected $fillable = [
        'CTHAJAR',
        'CSMT',
        'CHARI',
        'CSESI',
        'CKDRUANG',
        'CNOTAB',
        'CKELOMPOK',
        'NMAKS',
        'NISI'
    ];
}
