<main class="main-content mt-0">
    <section>
        <div class="page-header">
            <div class="container-fluid py-5 py-lg-6 px-lg-8">
                <div class="container px-0 px-lg-auto">
                    <div class="row pt-lg-5">
                        <div class="col-lg-12 col-12">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div class="card-body">
                                    <h6 class="text-black font-weight-bolder text-start mt-2 mb-0">Part 1. Personal Information</h6>                                   
                                    <form wire:submit="store">               
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
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($street ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Street</label>
                                                    <input wire:model.live="street" type="text" class="form-control">
                                                </div>
                                                @error('street')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($barangay ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Barangay</label>
                                                    <input wire:model.live="barangay" type="text" class="form-control">
                                                </div>
                                                @error('barangay')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($city ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">City</label>
                                                    <input wire:model.live="city" type="text" class="form-control">
                                                </div>
                                                @error('city')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($province ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Province</label>
                                                    <input wire:model.live="province" type="text" class="form-control">
                                                </div>
                                                @error('province')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($contact_number ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Contact Number</label>
                                                    <input wire:model.live="contact_number" type="text" class="form-control">
                                                </div>
                                                @error('contact_number')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 2. Student Information</h6> 
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
                                                <div class="relative">
                                                    <select wire:model.live="college_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="college">
                                                        <option value="0" disabled selected class="placeholder">Select College</option>
                                                        @foreach($colleges as $college)
                                                            <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('college_id')
                                                    <p class='text-danger inputerror'>Select a college</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="relative">
                                                    <select wire:model.live="program_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="program">
                                                        <option value="0" disabled selected class="placeholder">Select Program</option>
                                                        @foreach($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('program_id')
                                                    <p class='text-danger inputerror'>Select a program</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($major ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Major (leave blank if none)</label>
                                                    <input wire:model.live="major" type="text" class="form-control">
                                                </div>
                                                @error('major')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-4">
                                                <div class="input-group input-group-outline @if(strlen($student_number ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Student Number</label>
                                                    <input wire:model.live="student_number" type="text" class="form-control">
                                                </div>
                                                @error('student_number')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <div class="relative">
                                                    <select wire:model.live="year_level" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                                        <option value="0" disabled selected class="placeholder">Select Year Level</option>
                                                        <option value="1st year">1st year</option>
                                                        <option value="2nd year">2nd year</option>
                                                        <option value="3rd year">3rd year</option>
                                                        <option value="4th year">4th year</option>
                                                    </select>
                                                    @error('year_level')
                                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="relative">
                                                    <select wire:model.live="status" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                                        <option value="0" disabled selected class="placeholder">Select Status</option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Irregular">Irregular</option>
                                                    </select>
                                                    @error('status')
                                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 3. Medical Profile</h6>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(!empty($birthdate)) is-filled @endif">
                                                    <label class="form-label">Birthdate</label>
                                                    <input wire:model.live="birthdate" type="date" class="form-control">
                                                </div>
                                                @error('birthdate')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <div class="relative">
                                                    <select wire:model.live="sex" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="sex">
                                                        <option value="0" disabled selected class="placeholder">Select sex</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    @error('sex')
                                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="relative">
                                                    <select wire:model.live="blood_type" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                                        <option value="0" disabled selected class="placeholder">Select Blood Type</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                    @error('blood_type')
                                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($allergies ?? '') > 0) is-filled @endif">
                                                    <textarea wire:model.live="allergies" class="form-control" rows="4" placeholder="Enter your allergies"></textarea>
                                                </div>
                                                @error('allergies')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-outline @if(strlen($medical_history ?? '') > 0) is-filled @endif">
                                                    <textarea wire:model.live="medical_history" class="form-control" rows="4" placeholder="Enter your medical history"></textarea>
                                                </div>
                                                @error('medical_history')
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
            </div>
        </div>
    </section>
</main>
