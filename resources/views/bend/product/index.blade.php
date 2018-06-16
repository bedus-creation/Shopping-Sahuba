@extends('theme.shop.app')

@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
<style>
  .g-active{
    color: #333;
  }
  .g-active .fa {
    color: #333;
  }
</style>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            @include('bend.common.sidebar')
        </div>
        <div class="col-md-6">
            <div class="bg-white">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                        <div>
                            <span class="float-left"><strong class="btn font-weight-bold">All Product</strong></span>
                            <span class="float-right"><a href="{{url('/shopping/products/create')}}" class="btn btn-info"><i class="fa fa-plus text-white"></i> <span class="d-none d-md-inline">&nbsp;Add New Products</span></a></span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('#product').dropdown('toggle');
</script>
@endsection