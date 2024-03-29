<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{url('/bootstrap.css')}}">

    </head>
    <body class="">
        <div class="">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow">
                    <div class="">
                        {{ $header }}
                    </div>
                </header>
            @endif
                @if($errors->any())
                    <div class="alert alert-danger p-4 text-center">
                        <ul class="list-none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success text-center p-4" id="info">{{ session()->get('success') }}</div>
                @endif
                @if(session()->has('wrong'))
                    <div class="alert alert-warning p-4 text-center">{{ session()->get('wrong') }}</div>
                @endif
            <!-- Page Content -->
            <main class="container-fluid">
                {{ $slot }}
            </main>
            <div id="modalContainer"></div>
            <script src="{{url('bootstrap.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
            @yield('script')
        </div>
    </body>
</html>
