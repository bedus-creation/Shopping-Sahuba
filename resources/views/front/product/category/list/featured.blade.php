<div class="row m-0">
    @for($i=0;$i<18;$i++)
    <div class="col-md-3 col-4 p-0">
        <a href="{{url('/product/mobile')}}">
            <div class="card">
                <img src="{{url('img/mobile.jpg')}}" width="100%" >
                <div class="card-body">
                    <h6 class="card-title text-center">Samsung J2 Pro Mobile</h6>
                </div>
            </div>
        </a>
    </div>
    @endfor
    <div class="col-md-12 p-0  bg-white">
        <strong class="float-right p-2"><i class="fas fa-eye"></i> View All</strong>
    </div>
</div>
