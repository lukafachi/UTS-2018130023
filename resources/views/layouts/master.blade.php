<!doctype html>
<html lang="en">

<head>
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-1">
            <div class="text-center text-white">
                <a href="/home">
                    <img class="card-img-top" src="/img/logo/pokedex-logo.png" style="width:30%; height: 30%;"
                        alt="Card image cap"></a>
            </div>
        </div>
    </header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')
        MidTerm FADHIL</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @yield('content')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright © Pokemons 2021</p>
        </div>
    </footer>
    <script src="/js/app.js"></script>
</body>

</html>
