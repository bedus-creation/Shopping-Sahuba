<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Aammui Shopping&nbsp;</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{url('css/style.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Khand" rel="stylesheet">
        @yield('css')
        <script type="application/ld+json">
        {
        "@context": "http://schema.org/",
        "@type": "Product",
        "name": "Executive Anvil",
        "image": [
            "https://example.com/photos/1x1/photo.jpg",
            "https://example.com/photos/4x3/photo.jpg",
            "https://example.com/photos/16x9/photo.jpg"
        ],
        "brand": {
            "@type": "Thing",
            "name": "ACME"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.4",
            "ratingCount": "89"
        },
        "offers": {
            "@type": "AggregateOffer",
            "lowPrice": "119.99",
            "highPrice": "199.99",
            "priceCurrency": "USD"
        }
        }
        </script>
    </head>
<body>
    <div id="app">
        @include('component.front.NavbarTop')
        @yield('content')
    </div>
    @include('component.front.scripts')
    @yield('scripts')
</body>
</html>