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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button
            class="rounded-circle border-0"
            id="sidebarToggle"
        ></button>
    </div>

</ul>
