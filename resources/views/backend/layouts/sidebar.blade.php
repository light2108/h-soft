<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo">
        <img src="backend/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Dashtreme Admin</h5>
        <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
    </div>

    <ul class="metismenu" id="menu">
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul class="">
                <li><a href="{{url('/admin/dashboard')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Dashboard</a></li>
                <li><a href="{{url('/admin/account')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Profile</a></li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-grid'></i></div>
                <div class="menu-title">Projects</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/index/projects')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Index</a></li>
                <li><a href="{{url('/admin/create/project')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Create</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-grid'></i></div>
                <div class="menu-title">News</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/index/news')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Index</a></li>
                <li><a href="{{url('/admin/create/new')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Create</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-grid'></i></div>
                <div class="menu-title">Contacts</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/index/contacts')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Index</a></li>
                </li>
            </ul>
        </li>
    </ul>

</div>
