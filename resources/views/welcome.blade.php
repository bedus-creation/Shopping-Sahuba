@extends('layouts.app-front')

@section('css')
<style>
    .f-85{
        font-size:0.85rem;
    }
    .p-i{
        margin:5px;
        height: 6rem;
        background-color: #fff;
        background-position: center !important;
        background-size: contain !important;
    }
    .box:hover{
        z-index: 0;
        width: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .text::before{
        z-index: 11111 !important;
        content:'new ';
        color: green;
        position: relative;
        font-size: 13px;
        padding: 5px;
        font-weight: bold;
    }
    .text-box:after{
        content:' ';
        border-left: 60px solid transparent;
        border-top: 50px solid white;
        position:absolute;
        top:0;
        right:0;
        margin: 5px;
    }
    @media screen and (max-width:768px){
        .p-i{
            margin-top: 0px;
            height: 4rem;
        }
        .text::before{
            padding: 2px;
            margin: 0;
            font-size: 10px;
        }
        .text-box:after{
            margin: 0;
            border-left: 40px solid transparent;
            border-top: 40px solid #fff;
        }
        .f-85{
            font-size:0.7rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-9 pr-md-0">
            <div class="bg-white">
                <div class="card">
                    <div class="card-header"><strong>Featured Product</strong></div>
                </div>
            </div>
            @include('front.product.category.list.featured')
            <div class="bg-white">
                <div class="card">
                    <div class="card-header"><strong>Latest Product</strong></div>
                </div>
            </div>
            @include('front.product.category.list.featured')
        </div>
        <div class="col-md-3 pl-md-1">
            <div class="bg-white">
                <div class="card">
                    <div class="card-header mb-2"><strong>Top Shop</strong></div>
                        <div class="container">
                            @foreach($users as $user)
                            <div class="media">
                                <div class="mr-3">
                                    <a href="{{$user->profile_image}}" data-popup="lightbox">
                                        <img src="{{$user->profile_image}}" style="width:60px;height:60px;" class="rounded-circle img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h5 class="mt-0">{{$user->name}}</h5>
                                    <span class="text-muted">Chief officer</span>
                                </div>

                                <div class="">
                                    <ul class="list-unstyled">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-bars"></i></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection