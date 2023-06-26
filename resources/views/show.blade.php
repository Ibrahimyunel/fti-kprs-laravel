<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
  @inject('provider', 'App\Http\Controllers\SwitchCaseController')
  <x-popup />
  <main>
    <div class="C-data-mhs-wrapper">
      <h1 class="text-start mb-3">Data Mahasiswa</h1>
      <p>Nama : <strong>{{ $data->CNAMA }}</strong></p>
      <p>Alamat : <strong>{{ $data->CALAMAT }}</strong></p>
      <p>Tempat / Tanggal Lahir : <strong>{{ $data->CTEMPLHR . ' / ' . $data->DTGLHR}}</strong></p>
      <p>IPK : <strong>{{ $data->IPK }}</strong></p>
    </div>

    <div class="C-table">
      <div class="C-printpdf-form-wrapper">
        <h2 class="C-title">KRS Saya</h2>
        <form class="C-printpdf-form" method="POST" action="/kprs/printpdf/{{$data->cnim}}">
          @csrf
          <div class="C-btn-wrapper justify-content-start">
            <button class="C-btn C-print-btn">Print PDF</button>
          </div>
        </form>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Kode Matakuliah</th>
            <th scope="col">Nama Matakuliah</th>
            <th scope="col">SKS</th>
            <th scope="col">KELOMPOK</th>
            <th scope="col">Hari Dan Jam Kuliah</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datakrs as $item)
          @php
            $day = $provider::day($item->CHARI);
            $time = $provider::time($item->CSESI);
          @endphp
          <tr>
            <td scope="row">{{$item->CNOTAB}}</td>
            <td>{{$item->CNAMAMK}}</td>
            <td>{{$item->NSKS}}</td>
            <td>{{$item->CKELOMPOK}}</td>
            <td>{{$day . ', ' . $time}}</td>
            <td>
              <form method="POST" action="/kprs/delete/{{$data->cnim}}/{{$item->NOJADKUL}}">
                @csrf
                @method('DELETE')
                <div class="C-btn-wrapper">
                  <button class="C-btn">Remove</button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td scope="row"><strong>Total</strong></td>
            <td> </td>
            <td><strong>{{$totalSKS}}</strong></td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="C-table">
      <h2 class="C-title">Daftar KPRS</h2>
      <table class="table">
        <thead class="C-kprs-header">
          <tr>
            <th scope="col">Kode Matakuliah</th>
            <th scope="col">Nama Matakuliah</th>
            <th scope="col">SKS</th>
            <th scope="col">KELOMPOK</th>
            <th scope="col">Hari Dan Jam Kuliah</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kprsList as $item)
          @php
            $day = $provider::day($item->CHARI);
            $time = $provider::time($item->CSESI);

            $selected = 0;
            $crash = 0;
            $subjected = 0;
            $full = 0;
          @endphp

          @foreach ($datakrs as $krs)
            @if ($item->NOJADKUL == $krs->NOJADKUL)
              <tr class="table-success">
                <td scope="row">{{$item->CNOTAB}}</td>
                <td>{{$item->CNAMAMK}}</td>
                <td>{{$item->NSKS}}</td>
                <td>{{$item->CKELOMPOK}}</td>
                <td>{{$day . ', ' . $time}}</td>
                <td class="text-center"><strong>Selected</strong></td>
              </tr>
              @php
                $selected = 1;
              @endphp
              @break
            @endif
          @endforeach

          @if ($item->NMAKS == $item->NISI && $selected == 0)
            <tr class="table-dark">
              <td scope="row">{{$item->CNOTAB}}</td>
              <td>{{$item->CNAMAMK}}</td>
              <td>{{$item->NSKS}}</td>
              <td>{{$item->CKELOMPOK}}</td>
              <td>{{$day . ', ' . $time}}</td>
              <td class="text-center"><strong>Full</strong></td>
            </tr>
            @php
              $full = 1;
            @endphp
          @endif

          @foreach ($datakrs as $krs)
            @if ($item->CNOTAB == $krs->CNOTAB && $selected == 0 && $full == 0)
              <tr class="table-info">
                <td scope="row">{{$item->CNOTAB}}</td>
                <td>{{$item->CNAMAMK}}</td>
                <td>{{$item->NSKS}}</td>
                <td>{{$item->CKELOMPOK}}</td>
                <td>{{$day . ', ' . $time}}</td>
                <td class="text-center"><strong>Subject Selected</strong></td>
              </tr>
              @php
                $subjected = 1;
              @endphp
              @break
            @endif
          @endforeach

          @foreach ($datakrs as $krsCrash)
            @if ($selected == 0 && $subjected == 0 && $full == 0)
              @if ($item->CHARI == $krsCrash->CHARI)
                  @if ($item->CSESI == $krsCrash->CSESI)
                    <tr class="table-danger">
                      <td scope="row">{{$item->CNOTAB}}</td>
                      <td>{{$item->CNAMAMK}}</td>
                      <td>{{$item->NSKS}}</td>
                      <td>{{$item->CKELOMPOK}}</td>
                      <td>{{$day . ', ' . $time}}</td>
                      <td class="text-center"><strong>Crash</strong></td>
                    </tr>
                    @php
                      $crash = 1;
                    @endphp
                    @break
                  @endif
              @endif
            @endif
          @endforeach

          @if ($selected == 0 && $subjected == 0 && $crash == 0 && $full == 0)
            <tr>
              <td scope="row">{{$item->CNOTAB}}</td>
              <td>{{$item->CNAMAMK}}</td>
              <td>{{$item->NSKS}}</td>
              <td>{{$item->CKELOMPOK}}</td>
              <td>{{$day . ', ' . $time}}</td>
              <td>
                <form method="POST" action="/kprs/add/{{$data->cnim}}/{{$item->NOJADKUL}}/{{$totalSKS}}">
                  @csrf
                  <div class="C-btn-wrapper">
                    <button class="C-btn">Add</button>
                  </div>
                </form>
              </td>
            </tr>
          @endif
        @endforeach
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>