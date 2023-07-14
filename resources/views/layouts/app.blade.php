<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inventory</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Signika+Negative:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  @vite('resources/css/app.css')

  <style>
    .kbw-signature {
      width: 100%;
      height: 200px;
    }

    #sig canvas {
      width: 100% !important;
      height: auto;

    }
  </style>
</head>

<body class="bg-gray-100 font-['Figtree']">
  @include('partials.navbar')

  <div class="mt-20">
    @yield('content')
  </div>

</body>

</html>