<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema WebBiblio</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.css') }}" />

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

    @yield('stylesheet')    
</head>

<body>
    @yield('body')

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/js/metisMenu.min.js') }}" type="text/javascript"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>

    @yield('scripts')
</body>
</html>