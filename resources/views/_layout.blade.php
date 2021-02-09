<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Concierge - {{ config('app.name') }}</title>
		
		<link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

       

        @livewireStyles
        <link rel="stylesheet" href="{{ asset('assets/concierge/css/app.css') }}">
    </head>
    <body class="antialiased bg-gray-300">
        @if(Concierge::auth()->check())
            {!! Concierge::sidebar()->render() !!}
            @include('concierge::components.header')
            
            <main>
                @yield('content')
            </main>
        @else
            @yield('content')
        @endif

        @livewireScripts
        <script src="{{ asset('assets/concierge/js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
