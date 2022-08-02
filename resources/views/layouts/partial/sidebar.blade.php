

<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            Restaurant
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request:: is('admin/dashboard') ? 'active' :''}}  ">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request:: is('admin/user') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="material-icons">User</i>
                    <p>User</p>
                </a>
            </li>
            <li class="{{Request:: is('admin/category') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">Category</i>
                    <p>Category</p>
                </a>
            </li>
            <li class="{{Request:: is('admin/item') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('item.index')}}">
                    <i class="material-icons">Item</i>
                    <p>Item</p>
                </a>
            </li>
            @if(auth()->user()->type == 0)
            <li class="{{Request:: is('admin/staff') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('staff.index')}}">
                    <i class="material-icons">Staff</i>
                    <p>Staff</p>
                </a>
            </li>
            @endif
            <li>
                <form id="logout-form" method="post" action="{{route('logout')}}">
                    @csrf
                </form>
                <a class="nav-link" onclick="document.getElementById('logout-form').submit()">
                    <i class="material-icons">power_settings_new</i>
                    <p>Logout</p>
                </a>

            </li>
            {{-- <li class="{{Request:: is('admin/slider') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('slider.index')}}">
                    <i class="material-icons">slideshow</i>
                    <p>Slider</p>
                </a>
            </li>

            <li class="{{Request:: is('admin/category') ? 'active' :''}}  ">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Category</p>
                </a>
            </li>

            <li class="{{Request:: is('admin/item') ? 'active' :''}}  ">
                <a class="nav-link" href="{{route('item.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Items</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./rtl.html">
                    <i class="material-icons">language</i>
                    <p>RTL Support</p>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
