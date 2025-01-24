<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-12 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-body">
                    <h4 class="text-black font-weight-bolder text-center mt-2 mb-0">Enter student ID to check whether they underwent medical for the current semester</h4>
                    <form wire:submit='lookup' class="mx-10 px-10 py-2">
                        <div class="input-group input-group-outline mt-3 @if(strlen($student_id ?? '') > 0) is-filled @endif">
                            <label class="form-label">Student ID</label>
                            <input wire:model='student_id' type="text" class="form-control">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Lookup</button>
                        </div>

                        <h6 class="text-black font-weight-bolder text-center mt-2 mb-0">{{$response}}</h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>