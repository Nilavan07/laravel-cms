<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Console | {{ $title ?? 'Dashboard' }}</title>

  
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  rel="stylesheet"/>

  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  @stack('styles')
  
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="w3-light-grey">

  @include('partials.header', ['console' => true])

  
  @if(session('message'))
    <div class="w3-container w3-margin w3-card-4 w3-pale-green w3-border">
      {{ session('message') }}
    </div>
  @endif

  
  <main class="w3-container w3-margin-top w3-padding w3-card-4 w3-white w3-round-large">
    @yield('content')
  </main>

</body>
</html>
