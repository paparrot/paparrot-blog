<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="@yield('description', "Laravel web developer personal website")"/>
    <meta name="keywords" content="@yield('keywords', "PHP, Laravel, Development, Full stack, web development, Backend")"/>
    <title>@yield('description')</title>
    @vite('resources/css/app.css')
</head>
<body class="dark min-h-screen flex flex-col">
@include('components.header')
@include('components.flash-message')
<main class="grow p-5 container mx-auto">
    @yield('content')
</main>
@include('components.footer')
@vite('resources/js/app.js')
</body>

