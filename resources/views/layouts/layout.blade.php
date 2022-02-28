<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Salvator-mundi
        @if(!Route::is('welcome.index')) 
        | {{ basename(url()->current()) }}
        @endif
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{url('/storage/img/icon.png')}}" type="image/icon type">
    {{-- font-awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    {{-- styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        @include('layouts.nav')
    </header>
    
    <div>
        @yield('content')
    </div>

    <footer>
        @include('layouts.footer')
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


