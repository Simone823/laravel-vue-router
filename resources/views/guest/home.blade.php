<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('metaTitle')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Link tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d', 
                    },

                    container: {
                        center: true,
                    },

                    colors: {
                        'color-lime-1': '#06FF00',
                        'color-yellow-green-1': '#ffff40',
                        'color-blue-1': '#99FEFF',
                    },
                }
            }
        }
    </script>

    {{-- Link front css --}}
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    
</head>
<body>

    {{-- Root --}}
    <div id="root">

    </div>

    {{-- Script js front --}}
    <script src="{{asset('js/front.js')}}"></script>

</body>
</html>

