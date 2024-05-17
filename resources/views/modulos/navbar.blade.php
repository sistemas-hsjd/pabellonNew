<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
    <div class="container-fluid">
        <!-- Start navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar-full" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Contactos</a>
            </li>
        </ul>

        <!-- End navbar links -->
        <ul class="navbar-nav ms-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="navbar-badge badge bg-danger">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-end fs-7 text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">Call me whenever you can...</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="{{ Vite::asset('resources/assets/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle me-3">
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-end fs-7 text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">I got your message bro</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="{{Vite::asset('resources/assets/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle me-3">
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-end fs-7 text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">The subject goes here</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="navbar-badge badge bg-warning">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope me-2"></i> 4 new messages
                <span class="float-end text-muted fs-7">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users me-2"></i> 8 friend requests
                <span class="float-end text-muted fs-7">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file me-2"></i> 3 new reports
                <span class="float-end text-muted fs-7">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img src="{{ Vite::asset('resources/assets/img/user2-160x160.jpg') }}" class="user-image img-circle shadow" alt="User Image">
            <span class="d-none d-md-inline">Nelson Serrano Herrera</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ Vite::asset('resources/assets/img/user2-160x160.jpg') }}" class="img-circle shadow" alt="User Image">
                    <p>Nelson Serrano Herrera - Web Developer<small>Member since Nov. 2012</small></p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
            </ul>
        </li>

        </ul>
    </div>
</nav>
<!-- /.navbar -->