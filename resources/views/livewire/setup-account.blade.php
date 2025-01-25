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

                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 4. Allergies</h6>
                                        <div class="row mt-4">
                                            <div class="col-5">
                                                <div class="input-group input-group-outline @if(strlen($allergy_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Allergy Name</label>
                                                    <input wire:model.live="allergy_name" type="text" class="form-control">
                                                </div>
                                                @error('allergy_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-5">
                                                <div class="input-group input-group-outline @if(strlen($triggers ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Triggers (Optional)</label>
                                                    <input wire:model.live="triggers" type="text" class="form-control">
                                                </div>
                                                @error('triggers')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-2">
                                                <div class="text-center">
                                                    <button wire:click="addAllergy" type="button" class="btn bg-gradient-primary mb-2">Add</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display the list of allergies -->
                                        <div class="mt-4 mx-6">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Allergy Name</th>
                                                        <th>Triggers</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($allergies as $index => $allergy)
                                                        <tr>
                                                            <td>{{ $allergy['allergy_name'] }}</td>
                                                            <td>{{ $allergy['triggers'] ?? 'None' }}</td>
                                                            <td>
                                                                <button wire:click="removeAllergy({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="12" class="text-center">
                                                            <p class="text-sm text-muted my-2">No allergies listed</p>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <h6 class="text-black font-weight-bolder text-start my-4">Part 5. Medical Histories</h6>
                                        <div class="row mt-4">
                                            <div class="col-3">
                                                <div class="input-group input-group-outline @if(strlen($condition_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Condition Name</label>
                                                    <input wire:model.live="condition_name" type="text" class="form-control">
                                                </div>
                                                @error('condition_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <div class="input-group input-group-outline @if(strlen($treatment ?? '') > 0) is-filled @endif">
                                                    <select wire:model.live="treatment" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="sex">
                                                        <option value="0" disabled selected class="placeholder">Select Treatment</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Resolved">Resolved</option>
                                                        <option value="In remission">In remission</option>
                                                    </select>
                                                </div>
                                                @error('treatment')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-2">
                                                <div class="input-group input-group-outline @if(strlen($last_checkup ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Last Checkup</label>
                                                    <input wire:model.live="last_checkup" type="date" class="form-control">
                                                </div>
                                                @error('last_checkup')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-2">
                                                <div class="input-group input-group-outline @if($is_chronic) is-filled @endif">
                                                    <div class="form-check">
                                                        <input wire:model.live="is_chronic" class="form-check-input" type="checkbox" id="is_chronic">
                                                        <label class="form-check-label" for="is_chronic">
                                                            Chronic Condition
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="text-center">
                                                    <button wire:click="addMedicalHistory" type="button" class="btn bg-gradient-primary mb-2">Add</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display the list of medical histories -->
                                        <div class="mt-4 mx-6">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Condition Name</th>
                                                        <th>Treatment</th>
                                                        <th>Chronic</th>
                                                        <th>Last Checkup</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($medical_histories as $index => $history)
                                                        <tr>
                                                            <td>{{ $history['condition_name'] }}</td>
                                                            <td>{{ $history['treatment'] ?? 'N/A' }}</td>
                                                            <td>{{ $history['is_chronic'] ? 'Yes' : 'No' }}</td>
                                                            <td>{{ $history['last_checkup'] ? \Carbon\Carbon::parse($history['last_checkup'])->format('d/m/Y') : 'N/A' }}</td>
                                                            <td>
                                                                <button wire:click="removeMedicalHistory({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="12" class="text-center">
                                                            <p class="text-sm text-muted my-2">No allergies listed</p>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
