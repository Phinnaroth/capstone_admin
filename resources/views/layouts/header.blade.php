<header class="main-header">
    <a href="index2.html" class="logo">
        <span class="logo-lg"><b>GlowMatch</b></span>
    </a>
    <nav class="navbar navbar-static-top">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset(auth()->user()->foto ?? 'img/user.png') }}" class="img-circle img-profil" alt="User Image" style="width: 20px; height: 20px;">
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset(auth()->user()->foto ?? 'img/user.png') }}" class="img-circle img-profil" alt="User Image">
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('user.profil') }}" class="btn btn-primary btn-flat">My Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-danger btn-flat"
                                   onclick="$('#logout-form').submit()"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
    @csrf
</form>
