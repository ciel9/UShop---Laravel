<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 021 12345678</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> contact@oshop.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="{{asset('frontEnd/images/home/logo.png')}}" alt="" width="120px" /></a>
                    </div>                    
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            @if(Auth::check())
                            <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Logout </a>
                            </li>
                            @else
                            <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/list-products')}}">Products</a></li>
                                    <li><a href="{{url('/myaccount')}}">Account</a></li>
                                    <li><a href="{{url('/history')}}">History</a></li>
                                    <li><a href="{{url('/viewcart')}}">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="{{('/contact')}}">Contact</a></li>
                        </ul>
                    </div>
                    <!-- <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="dropdown"><a href="#">Filter<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/sortfiltercontroller/priceless100')}}">Product Price < 100k </a></li>
                                    <li><a href="{{url('/sortfiltercontroller/pricemore150')}}">Product Price > 150k </a></li>
                                    <li><a href="{{url('/sortfiltercontroller/pricemore1000')}}">Product Price > 1000k </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
 			        <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="dropdown"><a href="#">Sort<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/sortfiltercontroller/NameAsc')}}">Name Ascending(A-Z)</a></li>
                                    <li><a href="{{url('/msortfiltercontroller/NameDesc')}}">Name Descending(Z-A)</a></li>
                                </ul>
                            </li>
                            <li><a href="{{('/contact')}}">Contact</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-sm-3">
                <form action="{{ url('search') }}" method="GET"> 
                    <div class="search_box pull-right">
                        <input type="text" name="search" placeholder="Search..." />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header--> 
