<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" class="form-control" placeholder="Search products">
                </form>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-lg-block">
                @php
                    $ApproveCount = App\Models\RequestAprove::where('user_id', Auth::user()->id)->count();
                @endphp

                @if ($ApproveCount == 1)
                    @if (Auth::check() && Auth::user()->role == 0 && Auth::user()->status == 0)
                        <div class="d-flex">
                            <a class="nav-link btn btn-sm btn-warning p-2  ">Request Pending</a>
                            <form action="{{ url('cancel-request/' . Auth::user()->id) }}" method="POST">
                                @csrf
                                <button type="submit" class=" btn-sm btn-danger p-2">X</button>
                            </form>
                        </div>
                    @endif
                @else
                    @if (Auth::check() && Auth::user()->role == 0 && Auth::user()->status == 0)
                        <a class="nav-link btn btn-sm btn-success p-2"
                            href="{{ url('sent-request/' . Auth::user()->id) }}">Become a Vendor</a>
                    @endif
                @endif
            </li>





            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face15.jpg') }}"
                            alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ Auth::user()->name }}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>
