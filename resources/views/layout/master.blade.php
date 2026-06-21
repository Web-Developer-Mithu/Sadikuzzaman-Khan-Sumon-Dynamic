<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Md. Sadikuzzaman </title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" class="css">
</head>
<body>

<!-- NAVIGATION -->
@include('include.nav');

{{-- Content --}}
@yield('content')


{{-- Footer --}}
@include('include.footer');

<script src="{{ asset('script.js') }}" class="js"></script>
</body>
</html>
