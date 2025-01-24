<x-layouts.base>
    @if (in_array(request()->route()->getName(),['static-sign-in', 'static-sign-up', 'register', 'login', 'landing', 'password.forgot','reset-password', 'setup-account', 'medical-lookup', 'medical-status']))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <x-navbars.navs.guest></x-navbars.navs.guest>
                </div>
            </div>
        </div>
        @if (in_array(request()->route()->getName(),['static-sign-in', 'login', 'landing', 'password.forgot','reset-password', 'medical-lookup', 'medical-status']))
        <main class="main-content  mt-0">
            <div class="page-header page-header-bg align-items-start min-vh-100">
                    <span class="mask bg-gradient-dark opacity-6"></span>
            {{ $slot }}
            <x-footers.guest></x-footers.guest>
             </div>
        </main>
        @else
        {{ $slot }}
        @endif
    @else
    <x-navbars.sidebar></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth></x-navbars.navs.auth>

        {{ $slot }}

        <x-footers.auth></x-footers.auth>
    </main>
    @endif
</x-layouts.base>