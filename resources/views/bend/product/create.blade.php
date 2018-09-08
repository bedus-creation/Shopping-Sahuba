@extends('theme.shop.app')
@include('utils.success-error')
@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
<link rel="stylesheet" href="/lib/bootstrap-select/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="/css/file.upload.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
<form action="{{url('/shopping/products')}}" method="POST">
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3 d-none d-md-block">
            @include('bend.common.sidebar')
        </div>
        <div class="col-md-9 pl-md-0">
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
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>Product Name</label>
                              <input name="name" value="{{old('name')}}" type="text" class="form-control"  placeholder="Product Name">
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
                        </div>
                        <div class="col-md-6">
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
                                <label>Amount &nbsp;<small class="text-success">In Rupeese</small></label>
                              <input name="price" value="{{old('price')}}" type="number" class="form-control"  placeholder="In Nepali Rupeese (Only Number)">  
                            </div>
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
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Describe Your Product</label>
                            <textarea id="summernote" name="details" value="{{old('details')}}" type="text" class="form-control"  placeholder="Product Discription"></textarea>
                              <input type="hidden" name="media_id">
                              <br>
                              <div id="dropZone" class="dropzone">
                                  <div class="dz-default dz-message">
                                      <h3>{{ $title or  'Drop files here or click to upload.'}}</h3>
                                      <p class="text-muted">{{ $desc or 'Any related files you can upload' }} <br>
                                          <small>One file can be max {{ config('attachment.max_size', 0) / 1000 }} MB</small>
                                      </p>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">Save Product</button>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </form>
@endsection


@section('scripts')
<script src="/lib/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script>
    
    $('#product').collapse('show');

    $('.selectpicker').selectpicker({
      style: 'btn-info',
      size: 4
    });

    $('#summernote').summernote({
        placeholder: 'Details Goes Here',
        tabsize: 2,
        height: 200
    });

    Dropzone.autoDiscover = false;

    $("#dropZone").dropzone({
        addRemoveLinks: true,
        url: "{{ route('medias.store') }}",
        maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('attachment.max_size', 1000) / 1000 }},
        acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('media.allowed') !!}",
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        init: function () {  
            
            this.on("maxfilesexceeded", function(file){
                
            });

            
            var uploadedFiles = [];

            this.on("success", function(file, responseText) {
                console.log(responseText);
                uploadedFiles.push(responseText);
                addToInput(responseText.id);
            });

        
            this.on("removedfile", function (file) {
                var found = uploadedFiles.find(function (item) {
                    return (item.id==JSON.parse(file.xhr.response).id);
                })
                // If got the file lets make a delete request by id
                if( found ) {
                    $.ajax({
                        url: "/medias/" + found.id,
                        type: 'POST',
                        data:{
                            _method:'delete'
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if(response==1){
                                removeFromInput(found.id);
                            }
                        }
                    });
                }
            });

            // Handle errors
            this.on('error', function(file, response) {
                var errMsg = response;

                if( response.message ) errMsg = response.message;
                if( response.file ) errMsg = response.file[0];

                $(file.previewElement).find('.dz-error-message').text(errMsg);
            });
        }

    });
    function addToInput(id) {
        if($('input[name="media_id"]').val()==''){
            $('input[name="media_id"]').val(id);
        }else{
            data=$('input[name="media_id"]').val();
            $('input[name="media_id"]').val(data+','+id);
        }
    }
    function removeFromInput(id) {
        data=$('input[name="media_id"]').val().split(",")
                .filter(function(v){
                    return v!=id;
                });
            
        $('input[name="media_id"]').val(data.join(","));
    }

</script>
@endsection