<nav class="navbar navbar-expand-md navbar-dark bg-nav-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img class="" src="{{url('img/logo.png')}}"></a>
        <p class="navbar-cus">Aammui Shopping&nbsp;</p>
        <button class="navbar-toggler top-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-search"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Enter Search keywords">
                        <div class="input-group-prepend">
                            <button class="btn login-btn " type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-th"></i></a>
                </li>
                <li class="nav-item pl-0">
                    <a class="nav-link p-0" href="#">><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm  navbar-dark bg-nav sticky-top">
    <div class="container mx-auto d-sm-flex d-block flex-sm-nowrap">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        &nbsp;
        <a href="{{url('/')}}" class="d-inline d-md-none"><span style="color:rgb(255,255,255);">Aammui</span>&nbsp;
            <span style="color:rgb(255,255,255);">Shopping</span></u>
        </a>
        <div class="collapse navbar-collapse text-center bg-nav" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link pl-4 pr-4 " href="{{url('/')}}">
                        <i class="fa cfa fa-home" style="width:20px"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                    href="{{url('shop/kebar')}}">Shop</a>
                </li>
            </ul>
        </div>
    </div>
</nav>