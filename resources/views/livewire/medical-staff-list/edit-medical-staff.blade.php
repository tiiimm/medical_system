<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Edit Medical Staff</strong></h4>
                    </div>
                </div>  
                <div class="card-body">
                    <h6 class="text-black font-weight-bolder text-start mt-2 mb-0">Part 1. Personal Information</h6>                                   
                    <form wire:submit="update">               
                        <div class="row mt-4">
                            <div class="col-3-5">
                                <div class="input-group input-group-outline @if(strlen($last_name ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Last Name</label>
                                    <input wire:model.live="last_name" type="text" class="form-control">
                                </div>
                                @error('last_name')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3-5">
                                <div class="input-group input-group-outline @if(strlen($first_name ?? '') > 0) is-filled @endif">
                                    <label class="form-label">First Name</label>
                                    <input wire:model.live="first_name" type="text" class="form-control">
                                </div>
                                @error('first_name')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3-5">
                                <div class="input-group input-group-outline @if(strlen($middle_name ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Middle Name</label>
                                    <input wire:model.live="middle_name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-2-5">
                                <div class="input-group input-group-outline @if(strlen($extension_name ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Extension Name</label>
                                    <input wire:model.live="extension_name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3">
                                <div class="input-group input-group-outline @if(strlen($street ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Street</label>
                                    <input wire:model.live="street" type="text" class="form-control">
                                </div>
                                @error('street')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group input-group-outline @if(strlen($barangay ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Barangay</label>
                                    <input wire:model.live="barangay" type="text" class="form-control">
                                </div>
                                @error('barangay')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group input-group-outline @if(strlen($city ?? '') > 0) is-filled @endif">
                                    <label class="form-label">City</label>
                                    <input wire:model.live="city" type="text" class="form-control">
                                </div>
                                @error('city')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-3">
                                <div class="input-group input-group-outline @if(strlen($province ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Province</label>
                                    <input wire:model.live="province" type="text" class="form-control">
                                </div>
                                @error('province')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="input-group input-group-outline @if(strlen($contact_number ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Contact Number</label>
                                    <input wire:model.live="contact_number" type="text" class="form-control">
                                </div>
                                @error('contact_number')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-outline @if(strlen($email ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Email Address</label>
                                    <input wire:model.live="email" type="email" class="form-control">
                                </div>
                                @error('email')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-outline @if(strlen($username ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Username</label>
                                    <input wire:model.live="username" type="text" class="form-control">
                                </div>
                                @error('username')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <h6 class="text-black font-weight-bolder text-start my-4">Part 2. Work Information</h6> 
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="relative">
                                    <select wire:model.live="campus_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                        <option value="0" disabled selected class="placeholder">Select Campus</option>
                                        @foreach($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('campus_id')
                                    <p class='text-danger inputerror'>Select a campus</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline @if(strlen($zppsu_number ?? '') > 0) is-filled @endif">
                                    <label class="form-label">Employee ID</label>
                                    <input wire:model.live="zppsu_number" type="text" class="form-control">
                                </div>
                                @error('zppsu_number')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-33 my-4 mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
