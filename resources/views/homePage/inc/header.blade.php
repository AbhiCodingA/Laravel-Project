<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar">
    <button class="off-canvas-close"><i class="elegant-icon icon_close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50 mt-30">
            <div class="widget-header-2 position-relative">
                <h5 class="mt-5 mb-15">Hot topics</h5>
            </div>
            <div class="widget_nav_menu">
                <ul>
                    @foreach ($allcategory as $cat)
                        <li class="cat-item cat-item-2"><a
                                href="{{ route('home.category', $cat) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</aside>

<!-- Start Header -->

<header class="main-header header-style-1 font-heading">
    <div class="header-top">
        <div class="container">
            <div class="row pt-20 pb-20">
                <div class="col-md-3 col-xs-6">
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset($website->website_logo) }}"
                            alt="" width="200px"></a>
                </div>

                {{-- <div class="col-md-9 col-xs-6 text-right header-top-right">
                    <ul class="list-inline nav-topbar d-none d-md-inline">
                        <li class="list-inline-item menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu font-small">
                                @foreach ($pages as $row)
                                    <li class=""><a
                                            href="{{ route('home.page', ['slug' => $row->slug]) }}">{{ $row->page_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @guest
                            <li class="list-inline-item menu-item-has-children"><a href="#">Login or Register</a>
                                <ul class="sub-menu font-small">
                                    <li class=""><a href="{{ route('login') }}">Login</a></li>
                                    <li class=""><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li>
                        @endguest
                        @auth
                            <li class="list-inline-item menu-item-has-children"><a
                                    href="#">{{ auth()->user()->name }}</a>
                                <ul class="sub-menu font-small">

                                    @if (auth()->user()->role_id == 2)
                                        <li class=""><a href="{{ route('admin.index') }}">Admin Panel</a></li>
                                    @endif

                                    <li class=""><a
                                            onclick="event.preventDefault(); document.getElementById('nav-logout').submit()"
                                            href="#">Logout</a>
                                        <form action="{{ route('logout') }}" id="nav-logout" method="post">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth

                    </ul>
                    <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                    <button class="search-icon d-none d-md-inline"><span class="mr-15 text-muted font-small"><i
                                class="elegant-icon icon_search mr-5"></i>Search</span></button>

                </div> --}}

                <div class="col-md-9 col-xs-6 text-right header-top-right" style="font-size: 16px;">
                    <ul class="list-inline nav-topbar d-none d-md-inline">
                        <li class="list-inline-item menu-item-has-children">
                            <a href="#" class="text-lg" style="font-size: 16px;">Pages</a>
                            <ul class="sub-menu font-small" style="font-size: 16px;">
                                @foreach ($pages as $row)
                                    <li><a href="{{ route('home.page', ['slug' => $row->slug]) }}" style="font-size: 16px;">{{ $row->page_title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @guest
                            <li class="list-inline-item menu-item-has-children">
                                <a href="#" class="text-lg" style="font-size: 16px;">Login / Register</a>
                                <ul class="sub-menu font-small" style="font-size: 16px;">
                                    <li><a href="{{ route('login') }}" style="font-size: 16px;">Login</a></li>
                                    <li><a href="{{ route('register') }}" style="font-size: 16px;">Register</a></li>
                                </ul>
                            </li>
                        @endguest
                        @auth
                            <li class="list-inline-item menu-item-has-children">
                                <a href="#" class="text-lg" style="font-size: 16px;">{{ auth()->user()->name }}</a>
                                <ul class="sub-menu font-small" style="font-size: 16px;">
                                    @if (auth()->user()->role_id == 2)
                                        <li><a href="{{ route('admin.index') }}" style="font-size: 16px;">Admin Panel</a></li>
                                    @endif
                                    <li>
                                        <a onclick="event.preventDefault(); document.getElementById('nav-logout').submit()" href="#" style="font-size: 16px;">Logout</a>
                                        <form action="{{ route('logout') }}" id="nav-logout" method="post">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                    <span class="vertical-divider mr-20 ml-20 d-none d-md-inline"></span>
                    <button class="search-icon d-none d-md-inline">
                        <span class="mr-15 text-muted text-lg" style="font-size: 18px;">
                            <i class="elegant-icon icon_search mr-5"></i>Search
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="header-sticky">
        <div class="container align-self-center">
            <div class="mobile_menu d-lg-none d-block"></div>
            <div class="main-nav d-none d-lg-block float-left">
                <nav>
                    <!--Desktop menu-->
                    <ul class="main-menu d-none d-lg-inline font-small">
                        <li class="">
                            <a href="{{ route('home') }}"> <i class="elegant-icon icon_house_alt mr-5"></i>Home
                                Page</a>
                        </li>
                        @foreach ($categories as $cat)
                            <li class=""> <a href="{{ route('home.category', $cat) }}">
                                    {{ $cat->name }}</a> </li>
                        @endforeach
                    </ul>
                    <!--Mobile menu-->
                    <ul id="mobile-menu" class="d-block d-lg-none text-muted">
                        <li class="menu-item-has-children">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu font-small">
                                @foreach ($pages as $row)
                                    <li class=""><a
                                            href="{{ route('home.page', ['slug' => $row->slug]) }}">{{ $row->page_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Category</a>
                            <ul class="sub-menu font-small">
                                @foreach ($allcategory as $cat)
                                    <li class=""><a
                                            href="{{ route('home.category', $cat) }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @guest
                            <li class=" menu-item-has-children"><a href="#">Login or Register</a>
                                <ul class="sub-menu font-small">
                                    <li class=""><a href="{{ route('login') }}">Login</a></li>
                                    <li class=""><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </li>
                        @endguest
                        @auth
                            <li class=" menu-item-has-children"><a href="#">{{ auth()->user()->name }}</a>
                                <ul class="sub-menu font-small">

                                    <li class=""><a
                                            onclick="event.preventDefault(); document.getElementById('nav-logout').submit()"
                                            href="#">Logout</a>
                                        <form action="{{ route('logout') }}" id="nav-logout" method="post">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
            <div class="float-right header-tools text-muted font-small">
                {{-- <ul class="header-social-network d-inline-block list-inline mr-15">
                    @foreach ($socials as $row)
                        <li class="list-inline-item"><a class="pt" href="{{ $row->social_link }}"
                                target="_blank" title="Facebook"><i class="{{ $row->social_icon }}"></i></a></li>
                    @endforeach
                </ul> --}}
                <div class="off-canvas-toggle-cover d-inline-block">
                    <div class="off-canvas-toggle hidden d-inline-block" id="off-canvas-toggle">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</header>

<!--Start search form-->

<div class="main-search-form">
    <div class="container">
        <div class=" pt-50 pb-50 ">
            <div class="row mb-20">
                <div class="col-12 align-self-center main-search-form-cover m-auto">
                    <p class="text-center"><span class="search-text-bg">Search</span></p>
                    <form action="{{ route('search.post') }}" class="search-header" method="get">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" name="search"
                                placeholder="Search stories, places and people">
                            <div class="input-group-append">
                                <button class="btn btn-search bg-white" type="submit">
                                    <i class="elegant-icon icon_search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
