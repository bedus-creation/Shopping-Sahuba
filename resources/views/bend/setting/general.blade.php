@extends('theme.shop.app')
@include('utils.success-error')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/css/bend-index.css">
<link rel="stylesheet" href="/css/file.upload.css">
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
        <div class="col-md-9 pl-md-0 mb-4 pb-4">
            @yield('success-error')
            <div class="bg-white">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                        <div>
                            <span class="float-left"><strong class="btn font-weight-bold">Settings</strong></span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <form action="{{url('shopping/settings')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class=" bg-white">
                                        <div id="profile" class="edit" style="background-image:url('{{optional(auth()->user()->coverImage)->link()}}')">
                                            <div id="cover" class="btn btn-success float-right m-2" input-field="cover_image" data-value="{{optional(auth()->user()->coverImage)->id}}">Update Cover Image</div>
                                        </div>
                                        <div class="d-flex">
                                        <div class="logo ledit" style="background-image:url('{{optional(auth()->user()->profileImage)->link()}}')">
                                            <div id="update" input-field="profile_image" data-value="{{optional(auth()->user()->profileImage)->id}}" class="h-100 d-flex justify-content-center align-items-center" data-toggle="tooltip" data-placement="bottom" title="Update Profile Image">
                                                <button class="btn btn-success" type="button"><i class="fas fa-camera-retro"></i></button>
                                            </div>
                                        </div>
                                            <div class="basic">
                                                <ul class="list-group list-group-flush">
                                                    <li class="name list-group-item"><span style="color: red">{{auth()->user()->name}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <label class="float-right mb-0 pt-1 pb-1">Login Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="email" value="{{auth()->user()->email}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Mobile</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="mobile" value="{{auth()->user()->mobile}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Telephone</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="telephone" value="{{auth()->user()->telephone}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Address</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Enter Address" name="address" value="{{auth()->user()->profile->address ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Shop Established Date</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="date" placeholder="Shop Established Date" name="established_at" value="20{{optional(auth()->user()->profile)->established_at ? auth()->user()->profile->established_at->format('y-m-d'):date('y-m-d')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Sologon</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="Shop Sologon" name="sologon" value="{{auth()->user()->profile->sologon ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Opening Hours</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="10:00 am to 5:00 pm" name="opening_hours" value="{{auth()->user()->profile->opening_hours ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label class="float-right mb-0 pt-1 pb-1">Shop Info</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea rows="5" placeholder="Company Info Goes Here" name="info" class="form-control">{{auth()->user()->profile->info ?? ''}}</textarea>
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
<script src="/js/file.upload.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script>
    
    $('#setting').collapse('show');

    $('#cover').fileupload({
		serverUploadUrl:'{{ route('medias.store') }}',
		serverAllFileUrl:'{{ route('medias.index') }}'
    });
    
    $('#update').fileupload({
		serverUploadUrl:'{{ route('medias.store') }}',
		serverAllFileUrl:'{{ route('medias.index') }}'
	});

</script>
@endsection