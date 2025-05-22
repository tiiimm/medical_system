<main class="main-content mt-0">
    <section>
        <div class="page-header">
            <div class="container-fluid py-8 py-lg-7 px-lg-8">
                <div class="container px-0 px-lg-auto">
                    <div class="row pt-lg-3">
                        <div class="col-lg-12 col-12">
                            <div class="card z-index-0 fadeIn3 fadeInBottom">
                                <div class="card-body">
                                    <h6 class="text-black font-weight-bolder text-start mt-2 mb-0">Part 1. Personal Information</h6>                                   
                                    <form wire:submit="store" x-data>               
                                        <div class="row mt-3">
                                            <div class="col-12 col-md-6 col-lg-3 mb-3" @keydown.enter.prevent="$refs.first_name.focus()">
                                                <div class="input-group input-group-outline @if(strlen($last_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Last Name</label>
                                                    <input 
                                                        x-ref="last_name"
                                                        wire:model.live="last_name" 
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('last_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 mb-3" @keydown.enter.prevent="$refs.middle_name.focus()">
                                                <div class="input-group input-group-outline @if(strlen($first_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">First Name</label>
                                                    <input 
                                                        x-ref="first_name"
                                                        wire:model.live="first_name" 
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('first_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 mb-3" @keydown.enter.prevent="$refs.extension_name.focus()">
                                                <div class="input-group input-group-outline @if(strlen($middle_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Middle Name</label>
                                                    <input 
                                                        x-ref="middle_name"
                                                        wire:model.live="middle_name"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 mb-3" @keydown.enter.prevent="$refs.province.focus()">
                                                <div class="input-group input-group-outline @if(strlen($extension_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Extension Name</label>
                                                    <input 
                                                        x-ref="extension_name"
                                                        wire:model.live="extension_name"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-4 mb-3" @keydown.enter.prevent="$refs.city.focus()">
                                                <div class="input-group input-group-outline @if(strlen($province ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Province</label>
                                                    <input 
                                                        x-ref="province"
                                                        wire:model.live="province"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('province')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-3" @keydown.enter.prevent="$refs.barangay.focus()">
                                                <div class="input-group input-group-outline @if(strlen($city ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">City</label>
                                                    <input 
                                                        x-ref="city"
                                                        wire:model.live="city"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('city')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-3" @keydown.enter.prevent="$refs.street.focus()">
                                                <div class="input-group input-group-outline @if(strlen($barangay ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Barangay</label>
                                                    <input 
                                                        x-ref="barangay"
                                                        wire:model.live="barangay"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('barangay')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-4 mb-3" @keydown.enter.prevent="$refs.contact_number.focus()">
                                                <div class="input-group input-group-outline @if(strlen($street ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Street</label>
                                                    <input 
                                                        x-ref="street"
                                                        wire:model.live="street"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('street')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                <div class="input-group input-group-outline @if(strlen($contact_number ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Contact Number</label>
                                                    <input 
                                                        x-ref="contact_number"
                                                        wire:model.live="contact_number"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('contact_number')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4 mb-3">
                                                <div class="input-group input-group-outline @if($civil_status) is-filled @endif">
                                                    <label class="form-label">Civil Status</label>
                                                    <select wire:model.live="civil_status" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="civil_status">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widow/er">Widow/er</option>
                                                    </select>
                                                </div>
                                                @error('civil_status')
                                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-3">Part 2. Student Information</h6> 
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="input-group input-group-outline @if($campus_id) is-filled @endif">
                                                    <label class="form-label">Campus</label>
                                                    <select wire:model.live="campus_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                                        <option value="0" disabled selected hidden></option>
                                                        @foreach($campuses as $campus)
                                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('campus_id')
                                                <p class='text-danger inputerror'>Select a campus</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="input-group input-group-outline @if($college_id) is-filled @endif">
                                                    <label class="form-label">College</label>
                                                    <select wire:model.live="college_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="college">
                                                        <option value="0" disabled selected hidden></option>
                                                            @foreach($colleges as $college)
                                                            <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('college_id')
                                                <p class='text-danger inputerror'>Select a college</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="input-group input-group-outline @if($program_id) is-filled @endif">
                                                    <label class="form-label">Program</label>
                                                    <select wire:model.live="program_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="program">
                                                        <option value="0" disabled selected hidden></option>
                                                        @foreach($programs as $program)
                                                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('program_id')
                                                <p class='text-danger inputerror'>Select a program</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="input-group input-group-outline @if($major_id) is-filled @endif">
                                                    <label class="form-label">Major</label>
                                                    <select wire:model.live="major_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="major">
                                                        <option value="0" disabled selected hidden></option>
                                                        @if(!$na_major)
                                                            @foreach($majors as $major)
                                                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="{{ $major_id }}">N/A</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                @error('major_id')
                                                <p class='text-danger inputerror'>Select a Major</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="input-group input-group-outline @if(strlen($student_number ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Student Number (0000-00000)</label>
                                                    <input wire:model.live="student_number" type="text" class="form-control">
                                                </div>
                                                @error('student_number')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="input-group input-group-outline @if($year_level) is-filled @endif">
                                                    <label class="form-label">Year Level</label>
                                                    <select wire:model.live="year_level" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="years">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="1st year">1st year</option>
                                                        <option value="2nd year">2nd year</option>
                                                        <option value="3rd year">3rd year</option>
                                                        <option value="4th year">4th year</option>
                                                    </select>
                                                </div>
                                                @error('year_level')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="input-group input-group-outline @if($status) is-filled @endif">
                                                    <label class="form-label">Status</label>
                                                    <select wire:model.live="status" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="statuses">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="Regular">Regular</option>
                                                        <option value="Irregular">Irregular</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <h6 class="text-black font-weight-bolder text-start my-3">Part 3. Medical Profile</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <div class="input-group input-group-outline is-filled">
                                                    <label class="form-label">Birthdate</label>
                                                    <input wire:model.live="birthdate" type="date" class="form-control">
                                                </div>
                                                @error('birthdate')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3">
                                                <div class="input-group input-group-outline @if($sex) is-filled @endif">
                                                    <label class="form-label">Sex</label>
                                                    <select wire:model.live="sex" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="sex">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                @error('sex')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3">
                                                <div class="input-group input-group-outline @if($blood_type) is-filled @endif">
                                                    <label class="form-label">Blood Type</label>
                                                    <select wire:model.live="blood_type" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                    </select>
                                                </div>
                                                @error('blood_type')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <h6 class="text-black font-weight-bolder text-start my-3">Part 4. Allergies</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                <div class="input-group input-group-outline @if(strlen($allergy_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Allergy Name</label>
                                                    <input 
                                                        x-ref="allergy_name"
                                                        wire:model.live="allergy_name"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('allergy_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                <div class="input-group input-group-outline @if(strlen($triggers ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Triggers (Optional)</label>
                                                    <input 
                                                        x-ref="triggers"
                                                        wire:model.live="triggers"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('triggers')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                               <div class="input-group input-group-outline is-filled">
                                                    <label class="form-label">Last Occured</label>
                                                    <input wire:model.live="last_occured" type="date" class="form-control">
                                                </div>
                                                @error('last_occured')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                                <div class="input-group input-group-outline @if($is_active) is-filled @endif">
                                                    <div class="form-check pt-3">
                                                        <input wire:model.live="is_active" class="form-check-input" type="checkbox" id="is_active">
                                                        <label class="form-check-label ms-2" for="is_active">
                                                            Still Active
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                                <div class="text-center pt-2">
                                                    <button wire:click="addAllergy" type="button" class="btn bg-gradient-primary w-100">Add</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display the list of allergies -->
                                        <div class="mt-3 mx-0 mx-md-3">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Allergy</th>
                                                            <th>Triggers</th>
                                                            <th>Last Occurrence</th>
                                                            <th>Active</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($allergies as $index => $allergy)
                                                            <tr>
                                                                <td>{{ $allergy['allergy_name'] }}</td>
                                                                <td>{{ $allergy['triggers'] ?? 'None' }}</td>
                                                                <td>{{ $allergy['last_occured'] ? \Carbon\Carbon::parse($allergy['last_occured'])->format('d/m/Y') : 'N/A' }}</td>
                                                                <td>{{ $allergy['is_active'] ? 'Yes' : 'No' }}</td>
                                                                <td>
                                                                    <button wire:click.prevent="removeAllergy({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <p class="text-sm text-muted my-2">No allergies listed</p>
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <h6 class="text-black font-weight-bolder text-start my-3">Part 5. Medical Histories</h6>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                <div class="input-group input-group-outline @if(strlen($condition_name ?? '') > 0) is-filled @endif">
                                                    <label class="form-label">Condition Name</label>
                                                    <input 
                                                        x-ref="condition_name"
                                                        wire:model.live="condition_name"
                                                        type="text" 
                                                        class="form-control"
                                                        inputmode="text"
                                                        enterkeyhint="next">
                                                </div>
                                                @error('condition_name')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-3 mb-2">
                                                <div class="input-group input-group-outline @if($treatment) is-filled @endif">
                                                    <label class="form-label">Treatment Status</label>
                                                    <select wire:model.live="treatment" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="sex">
                                                        <option value="0" disabled selected hidden></option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Resolved">Resolved</option>
                                                        <option value="In remission">In remission</option>
                                                    </select>
                                                </div>
                                                @error('treatment')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                                <div class="input-group input-group-outline is-filled">
                                                    <label class="form-label">Last Checkup</label>
                                                    <input wire:model.live="last_checkup" type="date" class="form-control">
                                                </div>
                                                @error('last_checkup')
                                                <p class='text-danger inputerror'>{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                                <div class="input-group input-group-outline @if($is_chronic) is-filled @endif">
                                                    <div class="form-check pt-3">
                                                        <input wire:model.live="is_chronic" class="form-check-input" type="checkbox" id="is_chronic">
                                                        <label class="form-check-label ms-2" for="is_chronic">
                                                            Chronic
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-2 mb-2">
                                                <div class="text-center pt-2">
                                                    <button wire:click="addMedicalHistory" type="button" class="btn bg-gradient-primary w-100">Add</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Display the list of medical histories -->
                                        <div class="mt-3 mx-0 mx-md-3">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Condition</th>
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
                                                                    <button wire:click.prevent="removeMedicalHistory({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <p class="text-sm text-muted my-2">No medical history listed</p>
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-gradient-primary w-100 w-md-50 w-lg-33 my-2 mb-2">Submit</button>
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