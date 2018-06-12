<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New layout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('bend.common.head')
    @yield('head')
</head>
<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <div id="app">
        @include('bend.common.header')
        
        @include('bend.common.side')             
        @include('bend.common.contentnav')
        @yield('content')
    </div>
    @include('bend.common.scripts')
    @yield('scripts')
</body>
</html>