@extends('theme.shop.app')
@include('utils.success-error')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/css/bend-index.css">
<style>
  .g-active{
    color: #333;
  }
  .g-active .fa {
    color: #333;
  }
.note-editable { font-family: 'Roboto', sans-serif; font-size: 1rem !important; }
</style>
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
                            <span class="float-left"><strong class="btn font-weight-bold">Listing All Categories</strong></span>
                            <span class="float-right"><a href="{{url('categories/create')}}" class="btn btn-info"><i class="fa fa-bars text-white"></i> <span class="d-none d-md-inline">&nbsp;Add New Category</span></a></span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <table id="productList" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($users as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td class="text-center  text-nowrap" style="width:120px">
                                        <a href="{{$item->profile_link()}}" target="_blank" class="btn btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{url('admin/users/'.$item->id.'/edit')}}" class="btn btn-outline-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#"  class="btn btn-outline-danger" onclick="event.preventDefault();$('#{{$item->id.'-delete'}}').submit();" data-toggle="modal" data-target="#exampleModal">
                                            <i class=" far fa-trash-alt"></i>
                                            <form method="POST" id="{{$item->id.'-delete'}}" action="{{url('categories/'.$item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script>
    $('#users').collapse('show');
    $('#productList').DataTable({
        "scrollX": true
    });
</script>
@endsection