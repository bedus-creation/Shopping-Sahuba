@extends('theme.shop.app')

@section('css')
<style>
    #profile{
        height: 6rem;
        background: url('/img/company-cover.jpeg');
        background-position: center !important;
        background-size: cover !important;
    }
    .logo{
        margin-left:20px;
        margin-top: -2rem;
        background: url('/img/profile.jpg') no-repeat;
        background-color: #000;
        height: 4rem;
        width: 5rem;
        background-position: calc(100% + 10px);
        background-size: cover !important;
        border-radius: 50%;
    }
    a{
        color: #868e96;
    }
    .fa{
        color: #868e96;
    }
    .dropdown-menu-side{
        position: relative !important;
        position: absolute;
        transform: translate3d(0px,0px, 0px) !important;
        top: 0px;
        left: 0px;
        will-change: transform;
        width: 100%;
        margin-top: 0;
        border: none;
        border-left: 3px solid #868e96;
        border-radius: unset;
        margin-left: 0.5rem;
        padding-top: 0;
        padding-bottom: 0;
    }
    ul.list{
        padding-left: 0;
        list-style-type: none;
        padding-top: 10px;
    }
    ul.list li{
        font-size: 16px;
        padding: 5px 0 5px 40px;
    }
    ul.list li .fa {
        font-size: 18px;
    }
</style>
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            @include('bend.common.sidebar')
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