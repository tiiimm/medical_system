<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
                <img src="{{ asset('assets') }}/img/zppsu-logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">ZPPSU MedEx</span>
            </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->hasRole('administrator'))
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'campus-list' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('campus-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Campuses List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'college-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('college-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">apartment</i>
                    </div>
                    <span class="nav-link-text ms-1">Colleges List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'program-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('program-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">badge</i>
                    </div>
                    <span class="nav-link-text ms-1">Programs List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'medical-staff-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('medical-staff-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">medical_services</i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Staffs List</span>
                </a>
            </li>
            @elseif(auth()->user()->hasRole('medical staff'))
            <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'student-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('student-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Students List</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'appointment-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('appointment-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">checklist</i>
                    </div>
                    <span class="nav-link-text ms-1">Appointment List</span>
                </a>
            </li> -->
            @elseif(auth()->user()->hasRole('drrmo staff'))
            <li class="nav-item">
                <a class="nav-link text-white {{ str_starts_with(Route::currentRouteName(), 'appointment-list') ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('appointment-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Appointment List</span>
                </a>
            </li>
            @elseif(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'book-appointment' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('book-appointment') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">calendar_month</i>
                    </div>
                    <span class="nav-link-text ms-1">Book Appointment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'medical-records' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('medical-records') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">description</i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Records</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'appointment-history' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('appointment-history') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction History</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
