<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
  <main>
    <div class="C-table">
      <div class="C-mhs-printpdf">
        <p>NIM : <strong>{{ $data->cnim }}</strong></p>
        <p>Nama : <strong>{{ $data->CNAMA }}</strong></p>
        <p>Tempat / Tanggal Lahir : <strong>{{ $data->CTEMPLHR . ' / ' . $data->DTGLHR}}</strong></p>
        <p>Alamat : <strong>{{ $data->CALAMAT }}</strong></p>
        <p>IPK : <strong>{{ $data->IPK }}</strong></p>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Kode Matakuliah</th>
            <th scope="col">Nama Matakuliah</th>
            <th scope="col">SKS</th>
            <th scope="col">KELOMPOK</th>
            <th scope="col">Hari Dan Jam Kuliah</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datakrs as $item)
            @switch($item->CHARI)
            @case('1')
              @php
                $hari = 'Senin';
              @endphp
              @break
            @case('2')
              @php
                $hari = 'Selasa';
              @endphp
              @break
            @case('3')
              @php
                $hari = 'Rabu';
              @endphp
              @break
            @case('4')
              @php
                $hari = 'Kamis';
              @endphp
              @break
            @case('5')
              @php
                $hari = 'Jumat';
              @endphp
              @break
            @default
              @php
                $hari = 'Sabtu';
              @endphp
          @endswitch

          @switch($item->CSESI)
            @case('01')
              @php
                $time = '08:00 - 08:50';
              @endphp
              @break
            @case('02')
              @php
                $time = '08:50 - 09:40';
              @endphp
              @break
            @case('03')
              @php
                $time = '09:45 - 10:35';
              @endphp
              @break
            @case('04')
              @php
                $time = '10:40 - 11:30';
              @endphp
              @break
            @case('05')
              @php
                $time = '11:35 - 12:25';
              @endphp
              @break
            @case('06')
              @php
                $time = '12:30 - 13:20';
              @endphp
              @break
            @case('07')
              @php
                $time = '13:25 - 14:15';
              @endphp
              @break
            @case('08')
              @php
                $time = '14:20 - 15:10';
              @endphp
              @break
            @case('09')
              @php
                $time = '15:15 - 16:05';
              @endphp
              @break
            @default
              @php
                $time = '16:10 - 17:00';
              @endphp
          @endswitch
          <tr>
            <td scope="row">{{$item->CNOTAB}}</td>
            <td>{{$item->CNAMAMK}}</td>
            <td>{{$item->NSKS}}</td>
            <td>{{$item->CKELOMPOK}}</td>
            <td>{{$hari . ', ' . $time}}</td>
          </tr>
          @endforeach
          <tr>
            <td scope="row"><strong>Total</strong></td>
            <td> </td>
            <td><strong>{{$totalSKS}}</strong></td>
            <td> </td>
            <td> </td>
          </tr>
        </tbody>
      </table>
    </div>
  <main>
</body>
<html>