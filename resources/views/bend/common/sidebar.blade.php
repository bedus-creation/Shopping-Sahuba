<div class=" bg-white">
    <div id="profile" style="background-image:url('{{optional(auth()->user()->coverImage)->link()}}')"></div>
    <div class="d-flex">
    <div class="logo" style="background-image:url('{{optional(auth()->user()->profileImage)->link()}}')"></div>
        <div class="basic">
            <ul class="list-group list-group-flush">
                <li class="name list-group-item"><span style="color: red">{{auth()->user()->name}}</span></li>
            </ul>
        </div>
    </div>
</div>
<div class=" bg-white mt-1">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a class="d-flex flex-row justify-content-between" href="{{url('/shopping')}}">
                <div class="d-flex flex-row justify-content-start">
                    <div class=""><i class="fa fa-tachometer-alt"></i></div>
                    <div class="pl-3" style="cursor: pointer;">Dashboard</div>
                </div>
            </a> 
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a class="d-flex flex-row justify-content-between" id="product" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex flex-row justify-content-start">
                        <div class=""><i class="fa fa-boxes"></i></div>
                        <div class="pl-3" style="cursor: pointer;">Product</div>
                    </div>
                    <div class=""><i class="fa fa-angle-right"></i></div>
                </a> 
                <div class="dropdown-menu dropdown-menu-side" aria-labelledby="product">
                    <ul class="list">
                        <li>
                            <a href="{{url('/shopping/products/create')}}" class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class=""><i class="fa fa-plus"></i></div>
                                    <div class="pl-3" style="cursor: pointer;">Add Product</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/shopping/products')}}" class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class=""><i class="fa fa-chart-bar"></i></div>
                                    <div class="pl-3" style="cursor: pointer;">All Product</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a class="d-flex flex-row justify-content-between" id="gallery" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex flex-row justify-content-start">
                        <div class=""><i class="fa fa-chalkboard-teacher"></i></div>
                        <div class="pl-3" style="cursor: pointer;">Shop</div>
                    </div>
                    <div class=""><i class="fa fa-angle-right"></i></div>
                </a> 
                <div class="dropdown-menu dropdown-menu-side" aria-labelledby="gallery">
                    <ul class="list">
                        <li>
                            <a href="#" class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class=""><i class="fa fa-diagnoses"></i></div>
                                    <div class="pl-3" style="cursor: pointer;">Profile</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class=""><i class="fa fa-tachometer-alt"></i></div>
                                    <div class="pl-3" style="cursor: pointer;">Dashboard</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown" id="setting">
                <a class="d-flex flex-row justify-content-between" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex flex-row justify-content-start">
                        <div class=""><i class="fa fa-cog"></i></div>
                        <div class="pl-3" style="cursor: pointer;">Settings</div>
                    </div>
                    <div class=""><i class="fa fa-angle-right"></i></div>
                </a> 
                <div class="dropdown-menu dropdown-menu-side" aria-labelledby="setting">
                    <ul class="list">
                        <li>
                            <a href="{{url('shopping/settings')}}" class="d-flex flex-row justify-content-between">
                                <div class="d-flex flex-row justify-content-start">
                                    <div class=""><i class="fa fa-cog"></i></div>
                                    <div class="pl-3" style="cursor: pointer;">General</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <a class="d-flex flex-row justify-content-between" href="#">
                <div class="d-flex flex-row justify-content-start">
                    <div class=""><i class="fa fa-power-off text-danger"></i></div>
                    <div class="pl-3" style="cursor: pointer;">Logout</div>
                </div>
            </a> 
        </li>
    </ul>
</div>