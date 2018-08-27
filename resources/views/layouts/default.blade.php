<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="global_csrf_token" content="{{ csrf_token() }}">

    <title>@if(isset($page_name) && $page_name != ''){{$page_name}}@else{{ config('app.name', 'Laravel') }}@endif</title>

    <!-- Styles -->
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    @yield('header_css')

</head>
<body>
    <div id="app">
        @include('includes.navigation')

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
