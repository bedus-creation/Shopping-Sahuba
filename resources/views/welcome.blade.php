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
        <div class="col-md-8 pr-md-0">
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
        <div class="col-md-4 pl-md-1">
            <div class="bg-white">
                <div class="card">
                    <div class="card-header"><strong>Top Shop</strong></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection