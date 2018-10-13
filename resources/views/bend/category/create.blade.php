@extends('theme.shop.app')
@include('utils.success-error')


@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            @include('admin.common.sidebar')
        </div>
        <div class="col-md-9 pl-md-0 ">
            <div class="bg-white">
                <div class="card">
                    <div class="card-body">
                            @yield('success-error')
                        <div class="card-title">
                        <div>
                            <span class="float-left"><strong class="btn font-weight-bold">Listing All Product</strong></span>
                            <span class="float-right"><a href="{{url('/shopping/products/create')}}" class="btn btn-info"><i class="fa fa-plus text-white"></i> <span class="d-none d-md-inline">&nbsp;Add New Products</span></a></span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <form action="{{url('categories/')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3 text-right">
                                    Category Name
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-9 text-right">
                                    <button class="btn btn-success">Save Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('#category').collapse('show');
</script>
@endsection