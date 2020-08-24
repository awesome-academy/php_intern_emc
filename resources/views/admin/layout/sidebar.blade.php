<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{trans('admin.sidebar.title')}}<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fa fa-fw fa-tachometer-alt"></i>
            <b>Dashboard</b></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fa fa-fw fa-cog"></i>
            <b>Management</b>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('categories.index')}}">{{trans('admin.sidebar.category')}}</a>
                <a class="collapse-item" href="{{route('products.index')}}">{{trans('admin.sidebar.product')}}</a>
                <a class="collapse-item" href="{{route('requestproducts.index')}}">{{trans('admin.sidebar.request_product')}}</a>
                <a class="collapse-item" href="{{route('orders.index')}}">{{trans('admin.sidebar.order')}}</a>
                <a class="collapse-item" href="{{route('users.index')}}">{{trans('admin.sidebar.user')}}</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
