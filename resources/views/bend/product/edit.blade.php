@extends('theme.shop.app')
@include('utils.success-error')

@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
<link rel="stylesheet" href="/lib/bootstrap-select/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="/css/file.upload.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
<form action='{{url("/shopping/products/".$product->id)}}' method="POST">
    <input type="hidden" name="_method" value="PUT">

    @csrf
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
                          <span class="float-left"><strong class="btn font-weight-bold">Edit Product</strong></span>
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
                              <input name="name" value="{{$product->name}}" type="text" class="form-control"  placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label>Condition</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition1" {{($product->condition == '5')?'checked':''}} value="5">
                                    <label class="form-check-label" for="condition1">New </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition2" {{($product->condition == '4')?'checked':''}} value="4">
                                    <label class="form-check-label" for="condition2">Like New</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition3"  {{($product->condition =='3')?'checked':''}} value="3">
                                    <label class="form-check-label" for="condition3">Excellent</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition4" {{($product->condition =='2')?'checked':''}} value="2">
                                    <label class="form-check-label" for="condition4">Not Working</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" id="condition5" {{($product->condition =='1')?'checked':''}} value="1">
                                    <label class="form-check-label" for="condition5">Cannot Described</label>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Negotiable</label>
                                <div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable1" {{($product->negotiable =='1')?'checked':''}} value="1">
                                    <label class="form-check-label" for="negotiable1">Yes </label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="negotiable" id="negotiable2" {{($product->negotiable =='0')?'checked':''}} value="0">
                                    <label class="form-check-label" for="negotiable2">NO</label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="category_id" class="selectpicker" data-width="100%" data-live-search="true">
                                    <option>Select Categories</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{($product->category_id==$item->id) ? 'selected':''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Amount &nbsp;<small class="text-success">In Rupeese</small></label>
                              <input name="price" value="{{$product->price->min}}" type="number" class="form-control"  placeholder="In Nepali Rupeese (Only Number)">  
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
                          <textarea id="summernote" name="details" value="{{old('details')}}" type="text" class="form-control"  placeholder="Product Discription">{{$product->details}}</textarea>
                            <?php
                                $media_id=[];

                                foreach ($product->medias as $key => $value) {
                                    $media_id[]=$value->id;
                                }
                            ?>
                            <input type="hidden" name="media_id" value="{{implode(',',$media_id)}}">
                              <br>
                              <div id="dropZone" class="dropzone">
                                  <div class="dz-default dz-message">
                                      <h3>Drop files here or click to upload</h3>
                                      <p class="text-muted">{{ $desc ?? 'Any related files you can upload' }} <br>
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
        height: 200,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height',['height']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview','help']]
        ],
        fontSizes: ['18','20','22','24', '36'],
        fontNames: ["Roboto, sans-serif"],
    });

    Dropzone.autoDiscover = false;

    $("#dropZone").dropzone({
        addRemoveLinks: true,
        url: "{{ route('medias.store') }}",
        maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('attachment.max_size', 10000) / 1000 }},
        acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('media.allowed') !!}",
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        init: function () {  

            var uploadedFiles = [];

            @foreach($product->medias as $item)
                var mockFile = { name: "{{$item->id}}", id:"{{$item->id}}",size: {{rand(1000,10000)}}, type: 'image/jpeg' };       
                this.options.addedfile.call(this, mockFile);
                this.options.thumbnail.call(this, mockFile, "{{$item->link()}}");
                mockFile.previewElement.classList.add('dz-success');
                mockFile.previewElement.classList.add('dz-complete');

                uploadedFiles.push(mockFile);

            @endforeach
            
            this.on("maxfilesexceeded", function(file){
                
            });

            

            this.on("success", function(file, responseText) {
                console.log(responseText);
                uploadedFiles.push(responseText);
                addToInput(responseText.id);
            });

        
            this.on("removedfile", function (file) {
                var found = uploadedFiles.find(function (item) {
                    if (typeof file.id !== 'undefined') {
                        if(item.id==file.id){
                           removeFromInput(item.id);

                        }
                    }else if(item.id==JSON.parse(file.xhr.response).id){
                        deleteFileFromServer(item);
                        return true;
                    }

                    return false;

                });
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
    function deleteFileFromServer(found){
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
                }else{
                    alert('SOmething went Wrong');
                }
            }
        });
    }
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