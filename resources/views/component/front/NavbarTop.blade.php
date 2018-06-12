<nav class="navbar navbar-expand-md navbar-dark bg-nav-top">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link" href="#"  data-target="sidebar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th"></i></a>
                    @include('component.front.sidebar')
                </div>
            </li>
        </ul>
        <a class="navbar-brand" href="{{url('/')}}">
            <p class="navbar-cus">Aammui Shopping&nbsp;</p>
        </a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#nav-search" aria-controls="nav-search" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-search"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-search">
            <ul class="navbar-nav mx-auto">
                <form class="form-inline my-2 my-lg-0" method="GET" action="/">
                    <div class="input-group">
                        <input name="q" type="text" id="searchInput" class="form-control" placeholder="Enter Search keywords" onblur="$('#nav-search').removeClass('show');">
                        <div class="input-group-prepend">
                            <button class="btn login-btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item pl-0 pr-0 d-none d-inline">
                <div class="dropdown dropleft">
                    <a class="nav-link p-0" href="#" data-target="profileMenus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <div class="dropdown-menu" id="profileMenus" aria-labelledby="profileMenus">
                        <a class="dropdown-item" href="{{url('/login')}}">Login</a>
                        <a class="dropdown-item" href="{{url('/register')}}">Register</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

