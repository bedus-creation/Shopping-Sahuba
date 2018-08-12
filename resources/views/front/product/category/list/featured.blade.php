<div class="row m-0">
    @foreach($data as $item)
    <div class="col-md-3 col-4 p-0">
        <a href="{{url('/product/'.str_slug($item->name,'-').'/'.$item->id)}}">
            <div class="card box text-box h-100">
                <div class="p-i" style="background:url('{{$item->medias()->first()->base_url.json_decode($item->medias->first()->in_json)->images->small}}') no-repeat">
                    <span class="float-right text"></span>
                </div>
                <div class="card-body p-1">
                    <h6 class="card-title text-center f-85">{{$item->name}}</h6>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <div class="col-md-12 p-0  bg-white">
        <strong class="float-right p-2"><i class="fas fa-eye"></i> View All</strong>
    </div>
</div>
