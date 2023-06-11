<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://file.myfontastic.com/HHrMRS6fmM6hmFoAYrevD4/icons.css" rel="stylesheet">
        <title>Laravel</title>
        </head>
    <body class="flex flex-col h-screen bg-white text-slate-800 break-words">
        @include("components/navbar") 
        <!-------Body------------>
        @yield('content')
        @yield('script')
        <!-----Footer---------->
        @include("components/footer")
    </body>

</html>

