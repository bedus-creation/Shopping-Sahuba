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
            @include('bend.common.sidebar')
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
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Views Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Views Count</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price->min ?? 'No Price Available' }}</td>
                                    <td><span class="badge {{(date($item->expiry_date)<date("Y-m-d H:i:s"))? 'badge-danger':'badge-success'}}">{{$item->expiry_date}} </span></td>
                                    <td class="text-center">{{$item->views}}</td>
                                    <td class="text-center  text-nowrap" style="width:120px">
                                        <a href="{{$item->product_link()}}" target="_blank" class="btn btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/shopping/products/{{$item->id}}/edit" class="btn btn-outline-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#"  class="btn btn-outline-danger" onclick="#" data-toggle="modal" data-target="#exampleModal">
                                            <i class=" far fa-trash-alt"></i>
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
    $('#product').collapse('show');
    $('#productList').DataTable({
        "scrollX": true
    });
</script>
@endsection