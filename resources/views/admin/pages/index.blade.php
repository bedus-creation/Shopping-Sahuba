@extends('theme.shop.app')
@section('css')
<link rel="stylesheet" href="/css/bend-index.css">
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            @include('admin.common.sidebar')
        </div>
        <div class="col-md-6">
            
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $('body').on('show.bs.dropdown', function () {
        
    });
</script>
@endsection