@extends('theme.shop.app')
@include('utils.success-error')
@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
<link rel="stylesheet" href="/lib/bootstrap-select/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="http://movie.aammui.com/css/file.upload.css">
@endsection

@section('content')
<form action="{{url('/shopping/products')}}" method="POST">
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            @include('bend.common.sidebar')
        </div>
        <div class="col-md-6 pl-md-0">
            <div class="bg-white">
                <div class="card">
                    <div class="card-body">
                      @yield('success-error')
                      <div class="card-title">
                        <div>
                          <span class="float-left"><strong class="btn font-weight-bold">Add New Product</strong></span>
                          <span class="float-right"><a href="{{url('/shopping/products')}}" class="btn btn-info"><i class="fa fa-bars text-white"></i> <span class="d-none d-md-inline">&nbsp;List all Products</span></a></span>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                    
                      @csrf
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Product Name</label>
                              <input name="name" value="{{old('name')}}" type="text" class="form-control"  placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="category_id" value="{{old('category_id')}}" class="selectpicker" data-width="100%" data-live-search="true">
                                    <option value="1">Mobile</option>
                                    <option value="4">Bike</option>
                                    <option value="2">Laptop</option>
                                    <option value="3">Land</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Condition</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition1" value="5">
                                    <label class="form-check-label" for="condition1">New </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition2" value="4">
                                    <label class="form-check-label" for="condition2">Like New</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition3" value="3">
                                    <label class="form-check-label" for="condition3">Excellent</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition4" value="2">
                                    <label class="form-check-label" for="condition4">Not Working</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition5" value="1">
                                    <label class="form-check-label" for="condition5">Cannot Described</label>
                                  </div>
                                </div>
                            </div>
                            <div class="card-titlle">
                                <strong>Price</strong>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Amount &nbsp;<small class="text-success">In Rupeese</small></label>
                              <input type="text" name="price" value="{{old('price')}}" class="form-control"  placeholder="In Nepali Rupeese">  
                            </div>
                            <div class="form-group">
                                <label>Negotiable</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable1" value="1">
                                    <label class="form-check-label" for="negotiable1">Yes </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable2" value="0">
                                    <label class="form-check-label" for="negotiable2">NO</label>
                                  </div>
                                </div>
                            </div>
                            <div class="card-titlle">
                                <strong> Warranty Details</strong>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Is Warranty ?</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="warrenty_status" id="warrenty_status1" value="yes">
                                    <label class="form-check-label" for="warrenty_status1">Yes </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="warrenty_status" id="warrenty_status2" value="no">
                                    <label class="form-check-label" for="warrenty_status2">NO</label>
                                  </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Save Product</button>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
              <div class="form-group text-center" style="height: 300px;">
                <div id="cover" class="w-100 btn btn-secondary">Add Product Photo</div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </form>
@endsection


@section('scripts')
<script type="text/javascript" src="https://movie.aammui.com/js/file.upload.js"></script>
<script src="/lib/bootstrap-select/js/bootstrap-select.min.js"></script>
<script>
    $('#product').dropdown('toggle');
    $('.selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
    });
    $('#cover').fileupload({
      baseUrl:'{{url('/')}}/',
      input:"cover",
      serverUploadUrl:'/media',
      serverAllFileUrl:'/media'
    });

</script>
@endsection