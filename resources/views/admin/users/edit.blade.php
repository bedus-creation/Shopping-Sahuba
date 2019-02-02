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
                            <span class="float-left">
                                <strong class="btn font-weight-bold">{{$user->name}}</strong>
                            </span>
                            <span class="float-right">
                                <a href="{{url('admin/users')}}" class="btn btn-info">
                                    <i class="fa fa-bars text-white"></i> 
                                    <span class="d-none d-md-inline">&nbsp;Show All Users</span>
                                </a>
                            </span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <form action="{{url('admin/users/'.$user->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Company Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Role</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="roles form-control" multiple="multiple" name="roles[]">
                                                <option value="admin" {{(in_array("Admin",$user->roles->pluck('name')->toArray())==true) ? "selected":""}}>Admin</option>
                                                <option value="shop" {{in_array("Shop",$user->roles->pluck('name')->toArray()) ? "selected":""}}>Shop</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success float-right">Save Changes</button>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('#users').collapse('show');
    $('.roles').select2({
        placeholder: "Add More Roles",
        allowClear: true
    });
</script>
@endsection