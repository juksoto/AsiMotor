<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <title>
      </title>
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css" >
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="{{ asset('bootflat/css/bootflat.css') }}" rel="stylesheet" type="text/css" >
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    @yield('head')
</head>
<body class="admin">
    <section class="container">
        <section class="row top">

        </section>
    </section>
    <section class="container">
        @yield('content')
    </section>

    @include('admin.partials.scripts')
    @yield('scripts')
</body>
</html>


