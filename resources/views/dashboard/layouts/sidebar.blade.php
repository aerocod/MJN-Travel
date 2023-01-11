<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is("dashboard/destinations*") ? "active" : "" }}" aria-current="page" href="/dashboard/destinations">
                    Destinations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is("dashboard/categories*") ? "active" : "" }}" href="/dashboard/categories">
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is("dashboard/users*") ? "active" : "" }}" href="/dashboard/users">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is("dashboard/checkouts*") ? "active" : "" }}" href="/dashboard/checkouts">
                    Transactions
                </a>
            </li>
        </ul>
    </div>
</nav>