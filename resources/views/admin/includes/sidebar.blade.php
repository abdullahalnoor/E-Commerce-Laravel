<aside class="main-sidebar hidden-print">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
            <div class="pull-left info">
                <p>John Doe</p>
                <p class="designation">Frontend Developer</p>
            </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Category</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/category/add-category') }}"><i class="fa fa-plus"></i> Add Category</a></li>
                    <li><a href="{{ url('/category/manage-category') }}"><i class="fa fa-table"></i> Manage Category</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Brand</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/brand/add-brand') }}"><i class="fa fa-plus"></i> Add Brand</a></li>
                    <li><a href="{{ url('/brand/manage-brand') }}"><i class="fa fa-table"></i> Manage Brand</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Product</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/product/add-product') }}"><i class="fa fa-plus"></i> Add Product</a></li>
                    <li><a href="{{ url('/product/manage-product') }}"><i class="fa fa-table"></i> Manage Product</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="{{ url('/order/manage-order') }}"><i class="fa fa-opera"></i><span>Manage Order</span></a>
            </li>
        </ul>
    </section>
</aside>
