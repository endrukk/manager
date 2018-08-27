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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
    @yield('header_css')

</head>
<body>
    <div id="app">
        @include('includes.navigation')

        <div class="section">
            <h1 class="title is-2">@if(isset($page_name) && $page_name != ''){{$page_name}}@else{{ config('app.name', 'Laravel') }}@endif</h1>
            <div class="columns">
                @yield('content')
            </div>
        </div>

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bulma.js') }}"></script>
    @include('includes.footer_scripts')
</body>
</html>
