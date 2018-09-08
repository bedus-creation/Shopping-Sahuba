<ul class="navbar-nav">
    @guest

    @else
    <li class="nav-item pl-0 d-none d-md-inline" style="line-height:2.5"><strong>{{auth()->user()->name}}</strong></li>
    @endguest
    <li class="nav-item pl-0 pr-0 d-inline">
        <div class="dropdown dropleft">
            <a class="nav-link p-0" href="#" data-target="profileMenus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @guest
                <i class="fas fa-user"></i>
                @elseif(auth()->user()->profileImage!==null)
                <div class="top-user-img" style="background-image:url('{{optional(auth()->user()->profileImage)->link()}}')"></div>
                @else
                <i class="fas fa-user"></i>
                @endguest
            </a>
            <div class="dropdown-menu" id="profileMenus" aria-labelledby="profileMenus">
                <div class="container" id="menu">
                    <ul class="list-group">
                        @guest
                            <p class="section">Account</p>
                            <li class="list-group-item">
                                <a href="{{url('/login')}}">Login</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('/register')}}">Register</a>
                            </li>
                        @else
                            <p class="section pt-3">Product</p>
                            <li class="list-group-item">
                                <a href="{{url('shopping/products/create')}}">Add New Product</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('shopping/products')}}">List Of All Product</a>
                            </li>
                            <p class="section pt-3">Shop</p>
                            <li class="list-group-item">
                                <a href="{{auth()->user()->profile_link()}}">Profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('shopping')}}">Dashboard</a>
                            </li>
                            <p class="section pt-3">Settings</p>
                            <li class="list-group-item">
                                <a href="{{url('shopping/settings')}}">General</a>
                            </li>
                            <div class="dropdown-divider" style="border-top:1px solid #568ab5"></div>
                            <li class="list-group-item">
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </li>
</ul>