
<nav id="navbar" class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-lg-4 mx-2">
    <div class="container-fluid ps-2 pe-0">
        <a class="navbar-brand ms-lg-0 ms-3 d-flex flex-column" href="{{ route('landing') }}">
            <span class="font-weight-bolder">Medical Examination Records Management and Analytics System</span>
            <span class="font-weight-lighter text-xs">Medical Examination Records Management and Analytics System</span>
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            @if (request()->route()->getName() != 'setup-account')
            <ul class="navbar-nav mx-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                        href="{{ route('dashboard') }}">
                        <i class="fa fa-chart-pie opacity-6 text-white me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('profile') }}">
                        <i class="fa fa-user opacity-6 text-white me-1"></i>
                        Profile
                    </a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{route('medical-lookup') }}">
                        <i class="fas fa-search opacity-6 text-white me-1"></i>
                        Student Medical Lookup
                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('register') }}">
                        <i class="fas fa-user-circle opacity-6 text-white me-1"></i>
                        Sign Up
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('login') }}">
                        <i class="fas fa-key opacity-6 text-white me-1"></i>
                        Sign In
                    </a>
                </li>
                @endguest
            </ul>
            @else
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link me-2">
                        <i class="fa fa-user me-sm-1"></i>
                        <livewire:auth.logout/>
                    </a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>

<script>
    window.onscroll = function() {
        var navbar = document.getElementById("navbar");
        if (window.pageYOffset > 50) {  // When the user scrolls 50px from the top
            navbar.classList.remove("top-0");
            navbar.classList.remove("z-index-3");
            navbar.classList.remove("mt-4");
            navbar.classList.remove("mx-2");
        } else {
            navbar.classList.add("top-0");
            navbar.classList.add("z-index-3");
            navbar.classList.add("mt-4");
            navbar.classList.add("mx-2");
        }
    };
</script>