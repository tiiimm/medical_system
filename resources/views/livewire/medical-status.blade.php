<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-6 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-body">
                    <div>
                        @if ($medicalResult)
                            <h4 class="text-black font-weight-bolder text-center mt-2 mb-0">Medical Status</h4>
                            <p><strong>Name:</strong> {{ $medicalResult->appointment->student_information->user->name }}</p>
                            <p><strong>Student ID:</strong> {{ $medicalResult->appointment->student_information->user->profile->zppsu_number }}</p>
                            <p><strong>Status:</strong> Student underwent medical and results are posted in their account</p>
                            <p><strong>Date:</strong> {{ $medicalResult->appointment->created_at->toFormattedDateString() }}</p>
                            <p><strong>Semester:</strong> {{ $medicalResult->appointment->semester }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>S.Y.:</strong> {{ $medicalResult->appointment->school_year }}</p>
                        @else
                            <p>Invalid QR Code or no record found for this ID.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

