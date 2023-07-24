<!DOCTYPE html>
<html lang="en">
    <head>

        @include('user.layout/head')

    </head>

    <body>
        
        @include('user.layout/header')

        <div id="app">
            @yield('main-content')

            @show
        </div>

        @include('user.layout/footer')

        <script  src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
