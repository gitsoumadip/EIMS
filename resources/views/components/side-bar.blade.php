<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('/dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div> --}}
            <a href="{{ url('/admin/appoinment') }}" class="nav-item nav-link @yield('appoinment-active')"><i class="fa fa-keyboard me-2"></i>Appoinment</a>
            <a href="{{ url('/admin/event') }}" class="nav-item nav-link @yield('event-active')"><i class="fa fa-keyboard me-2"></i>Event</a>
            <a href="{{ url('/admin/brand') }}" class="nav-item nav-link @yield('brand-active')"><i class="fa fa-th me-2"></i>Brand</a>
            <a href="{{ url('/admin/category') }}" class="nav-item nav-link @yield('category-active')"><i class="fa fa-keyboard me-2"></i>Category</a>
            <a href="{{ url('/admin/model') }}" class="nav-item nav-link @yield('modelno-active')"><i class="fa fa-keyboard me-2"></i>Model Number</a>
            <a href="{{ url('/admin/product') }}" class="nav-item nav-link @yield('product-active')"><i class="fa fa-keyboard me-2"></i>Product</a>
            <a href="{{ url('/admin/supplier') }}" class="nav-suppler nav-link @yield('suppler-active')"><i class="fa fa-keyboard me-2"></i>Suppler</a>
            <a href="{{ url('/admin/store') }}" class="nav-store nav-link @yield('store-active')"><i class="fa fa-keyboard me-2"></i>Store</a>
            <a href="{{ url('/admin/item') }}" class="nav-item nav-link @yield('item-active')"><i class="fa fa-keyboard me-2"></i>Item</a>
            <a href="{{ url('/admin/stock') }}" class="nav-item nav-link @yield('stock-active')"><i class="fa fa-keyboard me-2"></i>Stock</a>
            <a href="{{ url('/admin/issue') }}" class="nav-issue nav-link @yield('issue-active')"><i class="fa fa-keyboard me-2"></i>issue</a>

            {{-- <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item active">Blank Page</a>
                </div>
            </div> --}}
        </div>
    </nav>
</div>
<!-- Sidebar End -->
