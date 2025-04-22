<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? 'Home' }} | My Portfolio</title>

  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  @stack('styles')
  
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="w3-light-grey">

  @include('partials.header', ['console' => false])

  <div class="container">
    <main class="w3-padding-large w3-white w3-card-4 w3-round-large">
      @yield('content')
    </main>
  </div>

  @include('partials.footer')

</body>
</html>
