<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/dashboard" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a {{-- data-bs-toggle="collapse" --}} href="/dashboard" class="collapsed" {{-- aria-expanded="false" --}}>
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="caret"></span> --}}
                    </a>
                    {{-- <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div> --}}
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item {{ Request::is('achievement') ? 'active' : '' }}">
                    <a href="/achievement">
                        <i class="fi fi-rs-trophy-star"></i>
                        <p>Achievement</p>
                    </a>
                    {{-- <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="components/avatars.html">
                        <span class="sub-item">Avatars</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/buttons.html">
                        <span class="sub-item">Buttons</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/gridsystem.html">
                        <span class="sub-item">Grid System</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/panels.html">
                        <span class="sub-item">Panels</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/notifications.html">
                        <span class="sub-item">Notifications</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/sweetalert.html">
                        <span class="sub-item">Sweet Alert</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/font-awesome-icons.html">
                        <span class="sub-item">Font Awesome Icons</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/simple-line-icons.html">
                        <span class="sub-item">Simple Line Icons</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/typography.html">
                        <span class="sub-item">Typography</span>
                      </a>
                    </li>
                  </ul>
                </div> --}}
                </li>
                <li class="nav-item {{ Request::is('project') ? 'active' : '' }}">
                    <a href="/project">
                        <i class="fi fi-rr-master-plan"></i>
                        <p>Projects</p>
                    </a>
                    {{-- <div class="collapse" id="sidebarLayouts">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="sidebar-style-2.html">
                        <span class="sub-item">Sidebar Style 2</span>
                      </a>
                    </li>
                    <li>
                      <a href="icon-menu.html">
                        <span class="sub-item">Icon Menu</span>
                      </a>
                    </li>
                  </ul>
                </div> --}}
                </li>
                <li class="nav-item {{ Request::is('gallerie') ? 'active' : '' }}">
                    <a href="/gallerie">
                        <i class="fi fi-rr-folder-camera"></i>
                        <p>Galleries</p>
                    </a>
                    {{-- <div class="collapse" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="forms/forms.html">
                        <span class="sub-item">Basic Form</span>
                      </a>
                    </li>
                  </ul>
                </div> --}}
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
    <div class="main-header">
        <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                <a href="index.html" class="logo">
                    <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                        height="20" />
                </a>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="gg-menu-right"></i>
                    </button>
                    <button class="btn btn-toggle sidenav-toggler">
                        <i class="gg-menu-left"></i>
                    </button>
                </div>
                <button class="topbar-toggler more">
                    <i class="gg-more-vertical-alt"></i>
                </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
                <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control" />
                    </div>
                </nav>

                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control" />
                                </div>
                            </form>
                        </ul>
                    </li>


                    <li class="nav-item topbar-user dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                            aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                            </div>
                            <span class="profile-username">
                                <span class="op-7">Hi,</span>
                                <span class="fw-bold">Hizrian</span>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img src="assets/img/profile.jpg" alt="image profile"
                                                class="avatar-img rounded" />
                                        </div>
                                        <div class="u-text">
                                            <h4>Hizrian</h4>
                                            <p class="text-muted">hello@example.com</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                    </li>
            </div>
            </ul>
            </li>
            </ul>
    </div>
    </nav>
    <!-- End Navbar -->
</div>
