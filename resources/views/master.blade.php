<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <!-- jQuery library -->
        <script src='/js/jquery-2.1.4.min.js'></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

    </head>
    <body>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        @yield('additional-scripts')

        @yield('main')

    </body>
</html>

