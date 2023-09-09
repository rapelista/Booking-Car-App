<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled"
    id="accordionSidebar"
>

    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="index.html"
    >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (url()->current() == route('dashboard.index')) active @endif">
        <a
            class="nav-link"
            href="{{ route('dashboard.index') }}"
        >
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Booking
    </div>

    <li class="nav-item @if (url()->current() == route('bookings.index')) active @endif">
        <a
            class="nav-link"
            href="{{ route('bookings.index') }}"
        >
            <i class="fas fa-fw fa-table"></i>
            <span>Bookings</span></a>
    </li>

    <li class="nav-item @if (url()->current() == route('bookings.create')) active @endif">
        <a
            class="nav-link"
            href="{{ route('bookings.create') }}"
        >
            <i class="fas fa-fw fa-plus"></i>
            <span>New Booking</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a
            aria-controls="collapseTwo"
            aria-expanded="true"
            class="nav-link collapsed"
            data-target="#collapseTwo"
            data-toggle="collapse"
            href="#"
        >
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div
            aria-labelledby="headingTwo"
            class="collapse"
            data-parent="#accordionSidebar"
            id="collapseTwo"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a
                    class="collapse-item"
                    href="buttons.html"
                >Buttons</a>
                <a
                    class="collapse-item"
                    href="cards.html"
                >Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a
            aria-controls="collapseUtilities"
            aria-expanded="true"
            class="nav-link collapsed"
            data-target="#collapseUtilities"
            data-toggle="collapse"
            href="#"
        >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div
            aria-labelledby="headingUtilities"
            class="collapse"
            data-parent="#accordionSidebar"
            id="collapseUtilities"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a
                    class="collapse-item"
                    href="utilities-color.html"
                >Colors</a>
                <a
                    class="collapse-item"
                    href="utilities-border.html"
                >Borders</a>
                <a
                    class="collapse-item"
                    href="utilities-animation.html"
                >Animations</a>
                <a
                    class="collapse-item"
                    href="utilities-other.html"
                >Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a
            aria-controls="collapsePages"
            aria-expanded="true"
            class="nav-link collapsed"
            data-target="#collapsePages"
            data-toggle="collapse"
            href="#"
        >
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div
            aria-labelledby="headingPages"
            class="collapse"
            data-parent="#accordionSidebar"
            id="collapsePages"
        >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a
                    class="collapse-item"
                    href="login.html"
                >Login</a>
                <a
                    class="collapse-item"
                    href="register.html"
                >Register</a>
                <a
                    class="collapse-item"
                    href="forgot-password.html"
                >Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a
                    class="collapse-item"
                    href="404.html"
                >404 Page</a>
                <a
                    class="collapse-item"
                    href="blank.html"
                >Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a
            class="nav-link"
            href="charts.html"
        >
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a
            class="nav-link"
            href="tables.html"
        >
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button
            class="rounded-circle border-0"
            id="sidebarToggle"
        ></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img
            alt="..."
            class="sidebar-card-illustration mb-2"
            src="{{ asset('img/undraw_rocket.svg') }}"
        >
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and
            more!
        </p>
        <a
            class="btn btn-success btn-sm"
            href="https://startbootstrap.com/theme/sb-admin-pro"
        >Upgrade to Pro!</a>
    </div>

</ul>
