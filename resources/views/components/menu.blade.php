<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm menu-home">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto menu-home__center">
                <li class="nav-item">
                    <a class="nav-link" href="">{{ trans('home.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ trans('home.products') }}</a>

                    <div class="sub-menu-home">
                        <div class="container">
                            <div class="row w-100">
                                <div class="col-4 category__item">
                                    <!-- Get into database -->
                                    <h2 class="category__item-title">
                                        <a href="" >Sách giáo khoa</a> 
                                    </h2>
                                    <ul class="category__item-list">
                                        <li>
                                            <a href="">Cấp 1</a>
                                        </li>
                                        <li>
                                            <a href="">Cấp 2</a>
                                        </li>
                                        <li>
                                            <a href="">Cấp 3</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">{{ trans('home.products_viewed') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-3">

                <div class="cart-item">
                    <a href="">
                        <i class="fas fa-cart-plus"></i>

                        <div class="cart-number">
                            <div class="d-flex justify-content-center align-items-center">
                                0
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                                {{ trans('auth.account') }}
                            </a>
                            <a class="dropdown-item" id="btn_logout" href="">
                                {{ trans('auth.logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
