<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body class="p-5">
        <header class="mb-3">
            <h1 class="text-center">BIRT LH</h1>
        </header>
        <nav class="d-flex my-3">
            <a href="{{route('home-view')}}" class="mx-2 btn border border-primary rounded bg-primary text-white">Inicio</a>
            <a href="{{route('products-view')}}" class="mx-2 btn border border-primary rounded bg-primary text-white">Productos</a>
            <a href="{{route('order-view')}}" class="mx-2 btn border border-primary rounded bg-primary text-white">Cesta</a>
        </nav>
        <section class="my-3">
            @yield('main-section')
        </section>
        <footer class="d-flex flex-row-reverse fixed-bottom">
            <img src="{{asset('img/birt-lh.png')}}"/>
        </footer>
    </body>
</html>