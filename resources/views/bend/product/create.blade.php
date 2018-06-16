@extends('theme.shop.app')

@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
<link rel="stylesheet" href="/lib/bootstrap-select/css/bootstrap-select.css">
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
                          <span class="float-left"><strong class="btn font-weight-bold">Add New Product</strong></span>
                          <span class="float-right"><a href="{{url('/shopping/products')}}" class="btn btn-info"><i class="fa fa-bars text-white"></i> <span class="d-none d-md-inline">&nbsp;List all Products</span></a></span>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      <form>
                        @csrf
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control"  placeholder="Product Name">
                              </div>
                              <div class="form-group">
                                  <label>Product Category</label>
                                  <select class="selectpicker" data-width="100%" data-live-search="true">
                                      <option>Mustard</option>
                                      <option>Ketchup</option>
                                      <option>Relish</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Condition</label>
                                  <div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                      <label class="form-check-label" for="inlineRadio1">New </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                      <label class="form-check-label" for="inlineRadio2">Like New</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                      <label class="form-check-label" for="inlineRadio2">Excellent</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                      <label class="form-check-label" for="inlineRadio2">Not Working</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                      <label class="form-check-label" for="inlineRadio2">Cannot Described</label>
                                    </div>
                                  </div>
                              </div>
                              <div class="card-titlle">
                                  <strong>Price</strong>
                              </div>
                              <hr>
                              <div class="form-group">
                                  <label>Amount &nbsp;<small class="text-success">In Rupeese</small></label>
                                  <input type="text" class="form-control"  placeholder="In Nepali Rupeese">  
                              </div>
                              <div class="form-group">
                                  <label>Negotiable</label>
                                  <div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio1" value="on">
                                      <label class="form-check-label" for="inlineRadio1">Yes </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="negotiable" id="inlineRadio2" value="off">
                                      <label class="form-check-label" for="inlineRadio2">NO</label>
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
                                      <input class="form-check-input" type="radio" name="negotiable" id="" value="on">
                                      <label class="form-check-label" for="">Yes </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="negotiable" id="" value="off">
                                      <label class="form-check-label" for="">NO</label>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="/lib/bootstrap-select/js/bootstrap-select.min.js"></script>
<script>
    $('#product').dropdown('toggle');
    $('.selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
    });

</script>
@endsection