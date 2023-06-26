<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwitchCaseController extends Controller
{
    public function day($variable)
    {
        switch ($variable) {
            case '1':
                $day = 'Senin';
                break;

            case '2':
                $day = 'Selasa';
                break;

            case '3':
                $day = 'Rabu';
                break;

            case '4':
                $day = 'Kamis';
                break;

            case '5':
                $day = 'Jumat';
                break;
            
            default:
                $day = 'Sabtu';
                break;
        }
        return $day;
    }

    public function time($variable)
    {
        switch ($variable) {
            case '01':
                $time = '08:00 - 08:50';
                break;
            case '02':
                $time = '08:50 - 09:40';
                break;
            case '03':
                $time = '09:45 - 10:35';
                break;
            case '04':
                $time = '10:40 - 11:30';
                break;
            case '05':
                $time = '11:35 - 12:25';
                break;
            case '06':
                $time = '12:30 - 13:20';
                break;
            case '07':
                $time = '13:25 - 14:15';
                break;
            case '08':
                $time = '14:20 - 15:10';
                break;
            case '09':
                $time = '15:15 - 16:05';
                break;
            default:
                $time = '16:10 - 17:00';
                break;
        }
        return $time;
    }
}
