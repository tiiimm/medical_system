
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="{{ url('/') }}">Pages</a>
                </li>
                @php
                    $routeParts = explode('/', Route::currentRouteName());
                    $breadcrumbs = array_slice($routeParts, 0, -1);
                    $currentPage = ucwords(str_replace('-', ' ', end($routeParts)));
                    $routePath = ''; // Initialize route path to build segments dynamically
                @endphp

                @foreach ($breadcrumbs as $breadcrumb)
                    @php
                        $routePath .= $breadcrumb . '/'; // Append breadcrumb to the route path
                    @endphp
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-5 text-dark" href="{{ url($routePath) }}">{{ ucwords(str_replace('-', ' ', $breadcrumb)) }}</a>
                    </li>
                @endforeach

                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                    {{ $currentPage }}
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize">{{ $currentPage }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <form method="POST" action="" class="d-none" id="logout-form">
                @csrf
            </form>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <livewire:auth.logout/>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
