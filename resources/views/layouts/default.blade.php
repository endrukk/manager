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
    <link href="{{ asset('css/bootstrap-4.1.3/bootstrap.min.css') }}" rel="stylesheet">
    @yield('header_css')

</head>
<body>
    <div id="app">
        @include('includes.navigation')

        <div class="container">
            <h1 class="title is-2">@if(isset($page_name) && $page_name != ''){{$page_name}}@else{{ config('app.name', 'Laravel') }}@endif</h1>
            @if ($errors->any())
                <div class="notification is-danger">
                    <h2 class="title is-5 is-marginless">Error</h2>
                    <button class="delete"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.1.3/bootstrap.js') }}"></script>
    @include('includes.footer_scripts')
</body>
</html>
