<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Audit instat Madagascar</title>
</head>
<body>
<?php $user = 'Zaiomeny'; ?>
    <header class="w-100 p-2 shadow-sm d-flex justify-content-between" style="height:100px;">
    <span><a href="/" class="btn btn-outline-danger float-start" style="margin-left:100px;">Accueil</a></span>
        <span><h2 class="text-center text-dark mt-2">Admin !</h2></span>
    <span class="float-end m-2">{{ $user }} </span>
    </header>
    <div class="container mt-2 p-3 shadow-sm">
        @yield('content')
    </div>
</body>
</html>