<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-bar-chart"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
            <a href="{{ route('products.index') }}">
                <i class="fa fa-cubes"></i> <span>Skincare Product</span>
            </a>
            <li>
            <a href="{{ route('questions.index') }}">
                <i class="fa fa-briefcase"></i> <span>Consulting Management</span>
            </a>
            </li>
            <li>
            <a href="{{ route('products.index') }}">
                <i class="fa fa-users"></i> <span>Users Management</span>
            </a>
            </li>
            <li>
            <a href="{{ route('ingredients.index') }}">
                <i class="fa fa-flask"></i> <span>Ingredient Management</span>
            </a>
            </li>
            <li>
            <a href="{{ route('products.index') }}">
                <i class="fa fa-clipboard"></i> <span>Report & Analytics</span>
            </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside><!-- visit "codeastro" for more projects! -->