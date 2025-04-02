<div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-logo.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">3,462</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Main Campus</p>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/kabasalan.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">53k</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Kabasalan Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/malangas.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">53k</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Malangas Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/siay.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">2,300</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Siay Campus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2-5 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img src="{{ asset('assets') }}/img/zppsu-campuses/vitali.png" class="h-70-p" alt="main_logo">
                        </div>
                        <div class="text-end pt-2">
                            <h5 class="mb-0">3,462</h4>
                            <p class="mb-0 text-xxs">Students Registered</p>
                        </div>
                    </div>
                    <div class="card-footer pt-0 pb-3">
                        <p class="mb-0 text-sm text-bold">Vitali Campus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($first_access)
    <div class="modal fade" id="autoOpenModal" tabindex="-1" aria-labelledby="autoOpenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="autoOpenModalLabel">Welcome to ZPPSU MedEx</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Would you like to book an appointment for a medical examination?
                </div>
                <div class="modal-footer">
                    <!-- Close Button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    <!-- Book Now Button -->
                    <a href="/book-appointment" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('js')
<script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('autoOpenModal'));
        myModal.show();
    });
</script>
@endpush
