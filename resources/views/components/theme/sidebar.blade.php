<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="storage/@common('logo_path')" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="storage/@common('logo_path')" alt="" height="50">
            </span>
        </a>
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="storage/@common('logo_path')" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="storage/@common('logo_path')" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="{{ URL::to('/') }}/custom/user.png" alt="Header Avatar">
                <span class="text-start">
                    @if (Auth::check())
                        <span class="d-block fw-medium sidebar-user-name-text">{{ Auth::user()->name }}</span>
                        <span class="d-block fs-14 sidebar-user-name-sub-text">
                            <i class="ri ri-circle-fill fs-10 text-success align-baseline"></i>
                            <span class="align-middle">Online</span>
                        </span>
                    @else
                        <span class="d-block fw-medium sidebar-user-name-text">Guest</span>
                        <span class="d-block fs-14 sidebar-user-name-sub-text">
                            <i class="ri ri-circle-fill fs-10 text-muted align-baseline"></i>
                            <span class="align-middle">Offline</span>
                        </span>
                    @endif
                </span>
            </span>
        </button>

        <div class="dropdown-menu dropdown-menu-end">
            @if (Auth::check())
                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
            @else
                <h6 class="dropdown-header">Welcome Guest!</h6>
            @endif

            @if (session('back_office') === true)
                <a class="dropdown-item" href="">
                    <i class="mdi mdi-briefcase text-muted fs-16 align-middle me-1"></i>
                    <span class="align-middle">Back Office</span>
                </a>
            @endif

            <a class="dropdown-item" href="#">
                <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Profile</span>
            </a>

            <a class="dropdown-item" href="#">
                <i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Help</span>
            </a>

            <div class="dropdown-divider"></div>

            @can('settings_overview')
                <a class="dropdown-item d-flex justify-content-between align-items-center" href="/settings">
                    <div>
                        <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
                        <span class="align-middle">Settings</span>
                    </div>
                    <span class="badge bg-success-subtle text-success mt-1">New</span>
                </a>
            @endcan

            <a class="dropdown-item" href="#">
                <i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle">Lock screen</span>
            </a>

            @if (Auth::guard('super_admin')->check())
                <form method="POST" action="{{ route('super_admin.logout') }}">
                @elseif(Auth::guard('tenant')->check())
                    <form method="POST" action="{{ route('tenant.logout') }}">
                    @else
                        <form method="POST" action="{{ route('logout') }}">
            @endif
            @csrf
            <button type="submit" class="dropdown-item">
                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                <span class="align-middle" data-key="t-logout">Logout</span>
            </button>
            </form>
        </div>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <?php
                $menuItems = getMenuTree(1);
                $menuTree = buildMenuTree($menuItems);
                renderMenuTree($menuTree, $menuItems);
                ?>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
