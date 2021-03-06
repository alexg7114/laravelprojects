<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs("categories.") || request()->is("admin/categories/*")) active @endif " aria-current="page" href="{{ route('categories.index') }}">
                    <span data-feather="home"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  @if(request()->routeIs("news.*") || request()->is("admin/news/*")) active @endif" href="{{ route('news.index') }}">
                    <span data-feather="file"></span>
                    News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>


    </div>
</nav>
