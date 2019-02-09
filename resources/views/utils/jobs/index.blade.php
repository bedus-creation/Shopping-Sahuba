@extends('theme.shop.app')

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
                        <div class="card-title">
                        <div>
                            <span class="float-left"><strong class="btn font-weight-bold">Listing All Product</strong></span>
                            <span class="float-right"><a href="{{url('/shopping/products/create')}}" class="btn btn-info"><i class="fa fa-plus text-white"></i> <span class="d-none d-md-inline">&nbsp;Add New Products</span></a></span>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <table id="productList" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Available At</th>
                                    <th>Reserved At</th>
                                    <th>Attempts</th>    
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Queue</th>
                                    <th>Created At</th>
                                    <th>Available At</th>
                                    <th>Reserved At</th>
                                    <th>Attempts</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->queue}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->available_at}}</td>
                                    <td class="text-center">{{$item->reserved_at}}</td>
                                    <td class="text-center  text-nowrap" style="width:120px">
                                        {{$item->attempts}}
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
    $('#jobs').collapse('show');
    $('#productList').DataTable({
        "scrollX": true
    });
</script>
@endsection