<div class="slimscroll-menu" id="remove-scroll">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
            <li class="menu-title">Navigation</li>

            <li>
                <a href="{{ route('home') }}">
                    <i class="fi-air-play"></i> <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="fi-target"></i> <span> Meal Manage </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('food') }}">Food List</a></li>
                    <li><a href="{{ route('meal') }}">Meal Add</a></li>
                    <li><a href="{{ route('meal.search') }}">Meal Search</a></li>
                </ul>
            </li>
            
            <li>
                <a href="javascript: void(0);"><i class="fi-target"></i> <span> Stock Manage </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('product') }}">Product List</a></li>
                    <li><a href="{{ route('order.create') }}">Order Product</a></li>
                    <li><a href="{{ route('order') }}">Order List</a></li>
                </ul>
            </li>


        </ul>

    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->
