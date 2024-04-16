<nav class="navbar navbar-expand-lg bg-green p-4">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">AIMS</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-link text-white {{ Request::is('home') ? 'active' : '' }}" href="home">Home</a>
                <a class="nav-link text-white {{ Request::is('suhu') ? 'active' : '' }}" href="suhu">Suhu</a>
                <a class="nav-link text-white {{ Request::is('ph') ? 'active' : '' }}" href="ph">Ph</a>
                <a class="nav-link text-white {{ Request::is('ppm') ? 'active' : '' }}" href="ppm">PPM</a>
                <a class="nav-link text-white {{ Request::is('about') ? 'active' : '' }}" href="about-us">About Us</a>
            </div>
            <div class="navbar-nav">
                {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                </span> --}}
                <div class="dropdown">
                    <button type="button" style="width: 3rem" class="mt-3 me-3 btn btn-success position-relative"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                    </button>
                    <ul class="dropdown-menu posisi-1 mt-3 dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Notification
                                <span
                                    class="position-absolute p-2 bg-primary mt-1 rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                                <span class="ms-5 text-primary">Mark
                                    all as read</span></a></li>
                        <hr>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="row">
                                    <div class="col-md-2 text-center">
                                        <img src="{{ asset('images/avatar.png') }}" class="mt-2"
                                            style="width: 30px; height: 30px;" alt="">
                                    </div>
                                    <div class="col-md-10" style="white-space: pre-line;">
                                        <p class="fw-bold" style="margin-top: -23px">System</p>
                                        <p style="margin-top: -45px">Report</p>
                                        <p style="margin-top: -55px">
                                            Suhu diatas parameter. Segera tambahkan air dingin dan dinginkan instalasi
                                        </p>
                                        <p style="margin-top: -30px; margin-bottom: -20px">1 min ago</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <li class="nav-item dropdown">
                    <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar.png') }}" style="width: 37px" height="37px" class="mt-3 me-3"
                            alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark mt-3 posisi">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit Profile</a></li>
                        <hr style="margin-top: 5px; margin-bottom: 5px">
                        <li><a class="dropdown-item text-danger" href="{{url('/')}}"><img src="{{ asset('images/icon-logout.png') }}" style="width: 18px; height: 18px;" class="me-1" alt=""> Keluar</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>