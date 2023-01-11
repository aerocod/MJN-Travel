<nav>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3  mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img class="bi me-2" width="200" height="32" src="{{ asset('img/Logo.png') }}" alt="">
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link {{ Request::is("/") ? "activated" : "" }}" href="/"  >Home</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is("destinations") ? "activated" : "" }}" href="/destinations" >Explore</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is("categories") ? "activated" : "" }}" href="/categories">Category</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is("about") ? "activated" : "" }}" href="/about">About</a></li>
                @auth
                    <li class="nav-item">
                        <div class="container">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="user-photo" alt="" style="border-radius: 50%; width:10%;">
                            </a>
                            <ul class="dropdown-menu">
                                @can("admin")
                                    {{-- kalau * jadi apapun tulisan atau route setalah kata dashboard/categories maka tombol akan tetap active --}}
                                    <li>
                                        <a class="dropdown-item" href="/dashboard/destinations">My Dashboard</a>
                                    </li>
                                @endcan
                                <li>
                                    <a class="dropdown-item" href="/orders">My Orders</a>
                                </li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </ul>
                        </div>
                    </li>
                    {{-- else disini kalau belum login --}}
                    @else 
                    <li>
                        <div class="btn-primary container">
                            <a href="/login" class="nav-link text-white">Sign In</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </header>
    </div>
</nav>