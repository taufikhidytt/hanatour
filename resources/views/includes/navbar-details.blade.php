<!-- Awal Navbar -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/')}}">
            <img src="{{ url('frontend/images/logo/logo.png')}}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link mr-4 active" href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link mr-4" href="{{ url('/.#popular')}}">Paket Travel</a>
                <a class="nav-item nav-link mr-4" href="{{ url('/.#testimonialheading')}}">Testimoni</a>

                {{-- Dekstop --}}
                @guest
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                        Sign In
                    </button>
                </form>

                {{-- Mobile --}}
                <form action="" class="form-inline d-sm-none d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('login')}}';">
                        Sign In
                    </button>
                </form>
                @endguest

                {{-- Dekstop --}}
                @guest
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-signup btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('register')}}';">
                        Sign Up
                    </button>
                </form>

                {{-- Mobile --}}
                <form action="" class="form-inline d-sm-none d-md-none">
                    <button class="btn btn-signup my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{ url('register')}}';">
                        Sign Up
                    </button>
                </form>
                @endguest

                {{-- Dekstop --}}
                @auth
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                        Logout
                    </button>
                </form>

                {{-- Mobile --}}
                <form class="form-inline d-sm-none d-md-none" action="{{ url('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0" type="submit">
                        Logout
                    </button>
                </form>
                @endauth

            </div>
        </div>
    </nav>
</div>
<!-- Akhir Navbar -->