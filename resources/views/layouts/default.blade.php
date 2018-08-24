<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @yield('header_css')
    <meta name="csrf-token" id="global_csrf_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('includes.navigator')

        <div class="section">
            @yield('content')
        </div>

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bulma.js') }}"></script>
    @yield('footer_js')
</body>
</html>
