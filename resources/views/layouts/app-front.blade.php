<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Hamrotalim | Online Shopping In Nepal')</title>
    <meta http-equiv="Lang" content="en" />
    <meta name="keywords"
        content="Online Shopping in nepal, nepalese Online Shop market, Sell your product online, buy products online, sell products online, Nepali bazzar, Online Bazzar,deal in nepal,secondhand products buy and sell, online deal in nepal,kathmandu" />
    <meta name="author" content="hamrotalim.com offers to sell your products / buy your products online  " />
    <meta name="description"
        content="Online Shopping in Nepal at Hamrotalim - An online Shopping platform for Shopkeeper who want to sell their products throug online.  The common Online Shopping for shop keepers and Customers." />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
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
        @include('theme.shop.components.footer')
    </div>
    @include('component.front.scripts')
    @yield('scripts')
</body>

</html>
