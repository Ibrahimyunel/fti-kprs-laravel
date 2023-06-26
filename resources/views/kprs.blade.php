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
  <main class="C-container-full p-3">
    <form class="C-card col-12 col-lg-5 p-3" action="{{ url('/kprs') }}" method="POST">
      @csrf
      <h2 class="C-form-title">KPRS</h2>
      <div class="mb-3">
        @error('cnim')
        <h4 class="text-danger text-center">{{$message}}</h4>
        @enderror
        <input
          type="text"
          class="C-input"
          id="cnim"
          name="cnim"
          placeholder="NIM"
          required
        />
      </div>
      <div class="mb-3">
        <input
          type="password"
          class="C-input"
          id="cnim"
          name="password"
          placeholder="Password"
          required
        />
      </div>

      <div class="C-btn-wrapper mb-3">
        <button class="C-btn" type="submit">Submit</button>
      </div>
    </form>
  </main>
</body>
</html>