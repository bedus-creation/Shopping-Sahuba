<nav class="navbar navbar-expand-md navbar-dark bg-nav-top sticky-top">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item pl-0">
                <div class="dropdown">
                    <a class="nav-link pl-0" href="#" data-target="sidebar" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fas fa-th"></i></a>
                    @include('component.front.sidemenu-left')
                </div>
            </li>
        </ul>
        <a class="navbar-brand" href="{{url('/')}}">
            <p class="navbar-cus">Hamro Talim &nbsp;</p>
        </a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#nav-search"
            aria-controls="nav-search" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-search"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-search">
            <ul class="navbar-nav mx-auto">
                <form class="form-inline my-2 my-lg-0" method="GET" action="/search">
                    <div class="input-group">
                        <input name="q" value="{{request()->q}}" type="text" id="searchInput" class="form-control"
                            placeholder="Enter Search keywords">
                        <div class="input-group-prepend">
                            <button class="btn login-btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </ul>
        </div>
        @include('component.front.sidemenu-right')
    </div>
</nav>
