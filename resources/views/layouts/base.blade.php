
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- importamos boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta name="keywords" content="tienda,gimnasio,fit,productos,entrenamiento,calidad,comestibles,nutricion, fitness, suplementos,articulos">
    <meta name="description" content="Creamos una tienda de productos para un gimansio">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
    <title>Mi Tiendita</title>
</head>
<body>

    {{-- aqui va todo mi contenido --}}
    <div class="container">
        @yield('content')
    </div>
{{-- <script>
    setTimeout(function() {
        location.reload();
    }, 1000);
</script> --}}
</body>
</html>
