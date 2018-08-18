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
            
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script>
    
    $('#setting').addClass('show');
    $('#setting > a').attr("aria-expanded","true");
    $('#setting > .dropdown-menu').addClass('show');
    $('#setting .fa-angle-right').css({'transform':'rotate(90deg)'});
    $('.dropdown').click(function(){

        // $('.dropdown').removeClass('show');
        // $('.dropdown > a').attr("aria-expanded","false");
        // $('.dropdown > .dropdown-menu').removeClass('show');
        $('.dropdown .fa-angle-right').css({'transform':'rotate(0deg)'});
        $(this).children(' .fa-angle-right').css({'transform':'rotate(90deg)'});

    });


    $('#productList').DataTable({
        "scrollX": true
    });
</script>
@endsection