<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href="index.html"> <img alt="image" src=""
                    class="header-logo" /> <span class="logo-name">Typing center</span>
            </a> --}}
            <h3>Shoes-Shop</h3>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link"><i
                        data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fa fa-users"></i><span>User</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/category*') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link"><i
                    class="fa fa-list-alt"></i><span>Category</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/subCategory*') ? 'active' : '' }}">
                <a href="{{ route('subCategory.index') }}" class="nav-link"><i
                    class="fa fa-list-alt"></i><span>subCategory</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/product*') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}" class="nav-link"><i
                    class="fab fa-product-hunt"></i><span>Product</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/upComingProduct*') ? 'active' : '' }}">
                <a href="{{ route('upComingProduct.index') }}" class="nav-link"><i
                    class="fab fa-product-hunt"></i><span>UpcomingProduct</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/getOrder*') ? 'active' : '' }}">
                <a href="{{ route('getOrder') }}" class="nav-link"><i class="fa fa-info-circle"></i><span>Order</span></a>
            </li>
            {{-- <li class="dropdown {{ request()->is('admin/totalIncome*') ? 'active' : '' }}">
                <a href="{{ route('totalIncome') }}" class="nav-link"><i
                    class="fab fa-product-hunt"></i><span>Total Income</span></a>
            </li> --}}
            <li class="dropdown {{ request()->is('admin/reports*') ? 'active' : '' }}">
                <a href="{{ route('reports') }}" class="nav-link"><i
                    class="fa fa-question-circle"></i><span>Reports</span></a>
                </li>
                {{-- <li class="dropdown {{ request()->is('admin/totalIncome*') ? 'active' : '' }}">
                    <a href="{{ route('totalIncome') }}" class="nav-link"><i
                        class="fab fa-product-hunt"></i><span>Total Income</span></a>
                </li> --}}
            {{-- <li class="dropdown {{ request()->is('admin/about*') ? 'active' : '' }}">
                <a href="{{ route('about.index') }}" class="nav-link"><i data-feather="monitor"></i><span>About
                        Us</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/policy*') ? 'active' : '' }}">
                <a href="{{ route('policy.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Privacy
                        Policy</span></a>
            </li>
            <li class="dropdown {{ request()->is('admin/terms*') ? 'active' : '' }}">
                <a href="{{ route('terms.index') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Term&Condition</span></a>
            <li class="dropdown {{ request()->is('admin/faq*') ? 'active' : '' }}">
                <a href="{{ route('faq.index') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>FAQ's</span></a>
            </li>
            </li> --}}
        </ul>
    </aside>
</div>
