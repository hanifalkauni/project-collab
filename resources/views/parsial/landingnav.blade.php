<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/">
                        <h4 class="text-light">BookReview</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="/">Homepage</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    @if (Route::has('login'))

                        @auth
                            <a class="dropdown-item" href="{{ url('/home') }}"><span class="icon_profile"></span>Dashboard</a>
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}"><span class="icon_profile"></span>Login</a>

                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}"><span class="icon_profile"></span>Register</a>
                            @endif
                    @endauth
                @endif
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
