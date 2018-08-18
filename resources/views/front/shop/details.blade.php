@extends('layouts.app-front')
@section('css')
<link href="{{url('css/company-profile.css')}}" rel="stylesheet">

@endsection

@section('content')
<div id="jobs">
    <div class="container mt-2">
        @include('front.shop.company-profile-cover')
        <div class="row mt-1 mb-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <strong class="section_title">Info</strong>
                        <p class="section_info">
                            Established in 2006, UBA Solutions as a Software Research
                            & Development Company looking for exceptionally bright and
                            motivated programmers to join our team. We pride ourselves 
                        </p>
                        <button type="button" class="btn btn-secondary">Read More....</button>
                        <p class="section_info">
                            in our research and development programs, providing comprehensive
                            solution to our world-class clients. If you are looking for an 
                            opportunity to use your skills in innovative ways in an environment
                            that promotes free thinking, presented with creative challenges
                            and makes real impact- UBA Solutions is the place for you. We 
                            partner with renowned Companies from Silicon Valley, as well
                            as additional countries around the world.
                        </p>
                    </div>
                    <div class="col-md-12 mt-1">
                        <strong class="section_title">Listed Product </strong>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($shop->products as $product)
                                <a href="{{url($product->product_link())}}">
                                    <div class="media mt-2 border p-3 text-muted">
                                        <div class="col-md-3 j-p-i" style="background: url('{{$product->medias()->first()->base_url.json_decode($product->medias->first()->in_json)->images->small}}')"></div>
                                        <div class="media-body pl-md-4">
                                        <h2 class="mt-0"><strong style="color: #2964a0;">{{$product->name}}</strong></h2>
                                        <h6><i class="far fa-money-bill-alt pr-2 text-muted"></i> Rs. {{$product->price->min}}</h6>
                                        <h6><i class="fas fa-map-marker-alt pl-1 pr-2 text-muted"></i>  Kathmandu </h6>
                                        <h6><i class="fas fa-clock pl-1 pr-2 text-muted"></i>    7 Days Left </h6>
                                        {{-- <h6 class="float-right"><span class="badge badge-primary pl-2 pr-2">php</span> <span class="badge badge-danger pl-2 pr-2">java</span>&nbsp;<span class="badge badge-success pl-2 pr-2">Laravel</span></h6> --}}
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Comapany Overview</li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="far fa-clock"></i></div>
                            <div class="pl-3">
                                10.00 Am to 5:30 PM
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="far fa-bookmark"></i></div>
                            <div class="pl-3">
                                Kupondole 32, Kathmandu
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="fas fa-chalkboard-teacher"></i></div>
                            <div class="pl-3">
                                OwnerShip Type: Private
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="fas fa-briefcase-medical"></i></div>
                            <div class="pl-3">
                                Medical Plan: NO
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="fas fa-chart-bar"></i></div>
                            <div class="pl-3">
                                Employee Size: 200-300
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="pl-3 d-flex justify-content-start">
                            <div><i class="fas fa-eye"></i></div>
                            <div class="pl-3">
                                Total Profile Views: 200
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

@endsection