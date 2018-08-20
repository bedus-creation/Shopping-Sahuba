@extends('layouts.app-front')
@section('css')
<link href="{{url('css/company-profile.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('js_slider/css/style.css')}}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">
<meta property="fb:app_id"                content="1622291221319152" /> 
<meta property="og:type"                  content="product.item" /> 
<meta property="og:url"                   content="{{url($product->product_link())}}" /> 
<meta property="og:title"                 content="{{$product->name}}" /> 
<meta property="og:image"                 content="{{$product->medias->first()->link()}}" /> 
<meta property="og:image:width" content="{{$product->medias->first()->size()->{'0'} ?? 300}}">
<meta property="og:image:height"  content="{{$product->medias->first()->size()->{'1'} ?? 300}}">
<meta property="product:retailer_item_id" content="{{$product->id}}" /> 
<meta property="product:price:amount"     content="{{$product->price->min ?? 0}}" /> 
<meta property="product:price:currency"   content="NRS" /> 
<meta property="product:availability"     content="Yes" /> 
<meta property="product:condition"        content="New" /> 
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:domain" content="{{url('/')}}"/>
<meta name="twitter:site" content="@sahuba.com" />
<meta name="twitter:description" property="og:description" itemprop="description" content="{{$product->details}}" />

<script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "Product",
        "name": "{{$product->name}}",
        "image": "{{$product->medias->first()->link()}}",
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
            "lowPrice": "{{$product->price->min ?? 0}}",
            "highPrice": "{{$product->price->min ?? 0}}",
            "priceCurrency": "NRS"
        }
    }
</script>

@endsection
@section('content')
<div id="jobs">
    <div class="container mt-2">
        @include('front.product.company-profile-cover')
        <div class="row mt-1 mb-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <strong class="section_title">Shop Info</strong>
                        <p class="section_info">
                            {{optional($product->user->profile)->info ?? ''}}
                        </p>
                    </div>
                    <div class="col-md-12 mt-1">
                        <div class=" pl-3 mt-2 card">
                            <strong class="section_title">{{$product->name}}</strong>
                            <strong class="float-right text-muted"><i class="fas fa-clock"></i>&nbsp;&nbsp;                                                
                                <strong class="text-danger">{{$product->expiry_date->diffForHumans()}}</strong>
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="p-img">
                            @include('front.product.image')
                        </div>
                    </div>
                    <div class="col-md-12">                    
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <ul class="list-group">
                                    <li class="list-group-item font-weight-bold border-0">Product Overview</li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="fas fa-barcode"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Product ID &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-5 pl-0 pr-0">
                                                {{$product->id}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="far fa-eye pl-0"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Ad Views &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-6 pl-0 pr-0">
                                                {{$product->views}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="far fa-clock"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Ad Post Date &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-6  pl-0 pr-0">
                                                {{$product->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="fas fa-calendar-times"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Expiry Date &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-6  pl-0 pr-0">
                                                <strong class="text-danger">{{$product->expiry_date->diffForHumans()}}</strong>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-group mt-2">
                                    <li class="list-group-item font-weight-bold border-0">Price & Condition</li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="fas fa-money-bill-alt"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Price  &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-5 pl-0 pr-0">
                                                Rs. {{$product->price->min}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="fas fa-hand-holding-usd"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Price Negotiable &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-6 pl-0 pr-0">
                                                {{($product->negotiable==1)?'yes':'no'}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5 pr-0">
                                                <div class="pl-md-3 pl-0 d-flex justify-content-start">
                                                    <div><i class="fas fa-cog"></i></div>
                                                    <div class="pl-md-3 pl-2">
                                                        &nbsp;Condition &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 pl-0 pr-0">
                                                : &nbsp; 
                                            </div>
                                            <div class="col-6  pl-0 pr-0">
                                                {{$product->condition=='1' ? 'Cannot Described':'' }}
                                                {{$product->condition=='2' ? 'Not Working':'' }}
                                                {{$product->condition=='3' ? 'Excellent':'' }}
                                                {{$product->condition=='4' ? 'Like New':'' }}
                                                {{$product->condition=='5' ? 'New':'' }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-group mt-2">
                                    <li class="list-group-item font-weight-bold border-0">Product Details</li>
                                    <li class="list-group-item">{{$product->details}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <ul class="list-group">
                            <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Shop Overview</li>
                            <li class="list-group-item">
                                <div class="pl-3 d-flex justify-content-start">
                                    <div><i class="far fa-clock"></i></div>
                                    <div class="pl-3">
                                        Opening H. :{{optional($product->user->profile)->opening_hours ?? 'Not Available'}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="pl-3 d-flex justify-content-start">
                                    <div><i class="far fa-bookmark"></i></div>
                                    <div class="pl-3">
                                        Address : {{optional($product->user->profile)->address ?? 'Not Available'}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="pl-3 d-flex justify-content-start">
                                    <div><i class="fas fa-chalkboard-teacher"></i></div>
                                    <div class="pl-3">
                                        Established at: {{optional($product->user->profile)->established_at ? '20'.optional($product->user->profile)->established_at->format('y-m-d'):'Not Available'}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-group mt-2">
                            <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Advertisement</li>
                        </ul>
        
            
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{url('/js_slider/js/jssor.slider-27.1.0.min.js')}}"></script>
<script src="{{url('/js_slider/js/script.js')}}"></script>
<script>
var jssor_1_SlideshowTransitions = [
  {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
  {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
];

    var jssor_1_options = {
  $AutoPlay: 1,
  $FillMode: 1,
  $SlideshowOptions: {
    $Class: $JssorSlideshowRunner$,
    $Transitions: jssor_1_SlideshowTransitions,
    $TransitionsOrder: 1
  },
  $ArrowNavigatorOptions: {
    $Class: $JssorArrowNavigator$
  },
  $ThumbnailNavigatorOptions: {
    $Class: $JssorThumbnailNavigator$,
    $SpacingX: 5,
    $SpacingY: 5
  }
};
var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
var MAX_WIDTH = 980;
function ScaleSlider() {
    var containerElement = jssor_1_slider.$Elmt.parentNode;
    var containerWidth = containerElement.clientWidth;
    if (containerWidth) {
        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
        jssor_1_slider.$ScaleWidth(expectedWidth);
    }
    else {
        window.setTimeout(ScaleSlider, 30);
    }
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);

</script>
@endsection