<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pabellón</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/css/OverlayScrollbars.min.css" integrity="sha256-WKijf8KI68sbq8Znd6yMepIuFF0wdWfIt6gk3JWcQfk=" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ Vite::asset('node_modules/@fortawesome/fontawesome-free/css/all.css') }}"> --}}
    @vite([ 'resources/assets/css/adminlte.css', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>