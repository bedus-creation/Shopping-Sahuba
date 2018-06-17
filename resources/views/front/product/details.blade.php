@extends('layouts.app-front')
@section('css')
<link href="{{url('css/company-profile.css')}}" rel="stylesheet">
@endsection
@section('content')
<div id="jobs">
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12" id="profile">   
            </div>
            <div class="col-md-12">
                <div class="info row">
                    <div class="col-md-8 d-flex">
                        <div class="logo"></div>
                        <div class="basic">
                            <ul class="list-group list-group-flush">
                                <li class="name list-group-item"><span style="color: red">Aammui Group of Company</span></li>
                            </ul>
                        </div>
                    </div>
                    <div id="social" class="col-md-4 d-flex justify-content-between">
                        <div class="item">
                            <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&app_id=1622291221319152&sdk=joey&u=''&display=popup&ref=plugin&src=share_button" 
                                onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')" style="background: #3B5998; width: 100px;" class="btn text-center w-100"><i class="fab fa-facebook-f"></i></a>     
                        </div>
                        <div class="item"> 
                            <a href="https://twitter.com/intent/tweet?text=" style="background: #55ACEE;" class="btn text-center w-100"
                                onclick="return !window.open(this.href, 'Twitter', 'width=640,height=580')"
                                >
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="item"> 
                            <a href="https://twitter.com/intent/tweet?text=" style="background: #f7f7f7;" class="btn text-center w-100"
                                onclick="return !window.open(this.href, 'Twitter', 'width=640,height=580')"
                                >
                                <i class="fas fa-plus"></i> Follow
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1 mb-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 info">
                        <strong class="section_title">Info</strong>
                        <p class="section_info">
                                Established in 2006, UBA Solutions as a Software Research & Development Company looking for exceptionally bright and motivated programmers to join our team. We pride ourselves in our research and development programs, providing comprehensive solution to our world-class clients. If you are looking for an opportunity to use your skills in innovative ways in an environment that promotes free thinking, presented with creative challenges and makes real impact- UBA Solutions is the place for you. We partner with renowned Companies from Silicon Valley, as well as additional countries around the world.
                        </p>
                    </div>
                    <div class="col-md-12 info mt-1">
                        <div class="p-2 pl-3 mt-2 card">
                            <strong class="section_title">{{$product->name}}</strong>
                            <strong class="float-right text-muted"><i class="fas fa-clock"></i>&nbsp;&nbsp;                                                
                                <strong class="text-danger">{{$product->expiry_date->diffForHumans()}}</strong>
                            </strong>
                        </div>
                        <hr>
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
                                                        &nbsp;Ad Expiry Date &nbsp;
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
                                                    {{$product->condition}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 info">
                <ul class="list-group">
                    <li class="list-group-item bg-secondary font-weight-bold text-white text-center">Shop Overview</li>
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