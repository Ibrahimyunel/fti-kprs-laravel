<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mmahasiswa';
    protected $fillable = [
        'cnim',
        'ckdlok',
        'CNAMA',
        'CALAMAT',
        'CNORMH',
        'CRT',
        'CRW',
        'CNOTELP',
        'CKDPOS',
        'CTEMPLHR',
        'DTGLHR',
        'CJENKEL',
        'CGOLDAR',
        'CAGAMA',
        'CSTATNKH',
        'IPK'
    ];
}
