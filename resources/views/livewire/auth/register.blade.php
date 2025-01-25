<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto mx-7 pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-75 my-8 border-radius-lg d-flex flex-column justify-content-center"
                            style="background-image: url('../assets/img/landing2.png'); background-size: cover;">
                        </div>
                    </div>
                    <div
                        class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p class="mb-0">Enter your email and password to register</p>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="store">
                                    <div class="input-group input-group-outline mt-3 @if(strlen($username ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Username</label>
                                        <input wire:model.live="username" type="text" class="form-control">
                                    </div>
                                    @error('username')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Email</label>
                                        <input wire:model.live="email" type="email" class="form-control">
                                    </div>
                                    @error('email')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                        <label class="form-label">Password</label>
                                        <input wire:model.live="password" type="password" class="form-control">
                                    </div>
                                    @error('password')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror

                                    <!-- Terms and Conditions Section -->
                                    <div class="form-check form-check-info text-start ps-0 mt-3">
                                        <input wire:model="termsAccepted" class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree to the <a href="javascript:;" data-bs-toggle="collapse" data-bs-target="#termsCondition" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div>

                                    <!-- Collapsible Terms and Conditions Content -->
                                    <div id="termsCondition" class="collapse mt-3">
                                        <p class="text-sm">
                                            This is solely for record-keeping and to ease the appointment process. Your information will not be shared with any third party unless with your approval. Your results are only visible to you and the medical staff in charge.
                                        </p>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" 
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" 
                                                :disabled="!termsAccepted">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Already have an account?
                                    <a href="{{ route('login') }}"
                                        class="text-primary text-gradient font-weight-bold">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
