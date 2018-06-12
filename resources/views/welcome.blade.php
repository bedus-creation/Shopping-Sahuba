@extends('layouts.app-front')

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