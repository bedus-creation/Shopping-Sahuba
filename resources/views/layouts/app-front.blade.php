<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title','Sahuba | Online Shopping In Nepal')</title>
        <meta http-equiv="Lang" content="en" />
	    <meta name="keywords" content="Online Shopping in nepal, nepalese Online Shop market, Sell your product online, buy products online, sell products online, Nepali bazzar, Online Bazzar,deal in nepal,secondhand products buy and sell, online deal in nepal,kathmandu" />
	    <meta name="author" content="Sahuba.com offers to sell your products / buy your products online  " />
	    <meta name="description" content="Online Shopping in Nepal at Sahuba.com - An online Shopping platform for Shopkeeper who want to sell their products throug online.  The common Online Shopping for shop keepers and Customers." />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="{{url('css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/app.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Khand" rel="stylesheet">
        @yield('css')
        <script type="application/ld+json">
            {
              "@context": "http://schema.org",
              "@type": "WebSite",
              "url": "{{url('/')}}",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "{{url('/')}}/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
              }
            }
        </script>
    </head>
<body>
    <div id="app">
        @include('auth.modal.login')
        @include('component.front.NavbarTop')
        @yield('content')
    </div>
    @include('component.front.scripts')
    @yield('scripts')
</body>
</html>