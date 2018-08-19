@extends('layouts.app-front')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1">
            <strong class="section_title">Listed Product </strong>
        </div>
        <div class="col-md-12">
            @foreach($products as $product)
            <a href="{{url($product->product_link())}}">
                <div class="media mt-2 border p-3 text-muted">
                    <div class="col-md-3 j-p-i" style="background: url('{{url(optional($product->medias->first())->link() ?? '')}}')"></div>
                    <div class="media-body pl-md-4">
                    <h2 class="mt-0"><strong style="color: #2964a0;">{{$product->name}}</strong></h2>
                    <h6><i class="far fa-money-bill-alt pr-2 text-muted"></i> Rs. {{$product->price->min}}</h6>
                    <h6><i class="fas fa-map-marker-alt pl-1 pr-2 text-muted"></i>  Kathmandu </h6>
                    {{-- <h6><i class="fas fa-clock pl-1 pr-2 text-muted"></i>    7 Days Left </h6> --}}
                    {{-- <h6 class="float-right"><span class="badge badge-primary pl-2 pr-2">php</span> <span class="badge badge-danger pl-2 pr-2">java</span>&nbsp;<span class="badge badge-success pl-2 pr-2">Laravel</span></h6> --}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

</div>
@endsection