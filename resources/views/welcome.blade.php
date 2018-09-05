@extends('layouts.app-front')

@section('css')
<style>
    .alert-alert{
        background-color: #0876ce;
        color: #f7f1f1;
    }
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
        z-index: 1;
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
                <div class="alert alert-alert alert-dismissible fade show" role="alert">
                    <strong>Free Service ! </strong> Create Your Shop online & sell Any number of Products for Free Forever. <strong> Yes Forever </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="bg-white">
                <div class="card">
                    <div class="card-header"><strong> Featured Product</strong></div>
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
                                    <a href="{{$user->profile_link()}}" class="shop">
                                        @if(optional($user->profileImage)->link()=='')
                                        <i class="fas fa-user"></i>
                                        @else
                                        <img src="{{optional($user->profileImage)->link()}}" style="width:50px;height:50px;" class="rounded-circle img-fluid" alt="">
                                        @endif
                                    </a>
                                </div>

                                <div class="media-body">
                                    <a href="{{$user->profile_link()}}">
                                        <h6 class="mt-0 mb-0">{{$user->name}}</h6> 
                                    </a> 
                                    <span class="text-muted small">{{optional($user->profile)->address ?? ''}}</span>
                                </div>

                                <div class="">
                                    <ul class="list-unstyled">
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown"><i class="fas fa-bars"></i></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{$user->profile_link()}}">Profile</a>
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