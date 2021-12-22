<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="/img/book-icon.png">
    <link rel="shortcut icon" sizes="192x192" href="/img/book-icon.png">
    <link rel="apple-touch-icon" href="/img/book-icon.png">

    <title>Cărți cu de toate</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Khula&family=Poppins&family=Nunito+Sans&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Styles -->
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-poppins scroll {{in_array(request()->route()->getName(),['home', 'profile', 'management-studenti', 'editare-utilizator', 'management-carti', 'carte']) ? 'main' : ''}}">
    <div class="relative mx-auto">
        @livewire('layouts.navbar')
        @if(in_array(request()->route()->getName(),['home', 'profile', 'management-studenti', 'editare-utilizator', 'management-carti', 'carte']))
            @livewire('layouts.sidenav')
        @endif
        <div id="main" class="p-10 {{in_array(request()->route()->getName(),['home', 'profile', 'management-studenti', 'editare-utilizator', 'management-carti', 'carte']) ? 'ml-64' : ''}}">
            {{ $slot }}
        </div>
    </div>
    @livewire('layouts.footer')
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
