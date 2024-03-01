<div class="container-fluid page-body-wrapper">
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
        </div>
    </div>
    <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
                <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count count-varient1"></span>
                    </a>
                    <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0"><a href="/chatify">Notifications</a> </h6>
                        <a href="/chatify" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{ asset('my/images/logo.png')}}" alt="" class="profile-pic" />
                            </div>
                            <div class="preview-item-content">
                                <p class="mb-0"> Inbox <span class="text-small text-muted">view notifications</span>
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-sm-flex">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count count-varient2">5</span>
                    </a>
                    <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Messages</h6>
                        <a href="/chatify" class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow">
                                <span class="badge badge-pill badge-success">Inbox</span>
                                <p class="text-small text-muted ellipsis mb-0"> Check inbox </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                    <form class="nav-link form-inline mt-2 mt-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" />
                            <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                <li class="nav-item nav-profile dropdown border-0">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                        <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                        <?php
                        $user = Illuminate\Support\Facades\Auth::user();
                        ?>
                        <span class="profile-name">{{$user->name}}</span>
                    </a>
                    <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-cached mr-2 text-success"></i>{{$user->name}} </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>{{ __('Signout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
