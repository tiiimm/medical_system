<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">
                        <h4 class="text-white m-0"><strong>New Medical Result</strong></h4>
                        @if ($selectedUser->medical_results()->latest()->first() && $selectedUser->medical_results()->latest()->first()->result_file_path)
                            <a href="{{ url('/medical-results/view/' . $selectedUser->medical_results()->latest()->first()->id) }}" 
                            class="btn btn-secondary btn-sm" 
                            target="_blank">
                            <i class="material-icons">visibility</i> View All Result Files
                            </a>
                        @endif
                    </div>
                </div>  
                <div class="container-fluid mx-2">           
                    <div class="row mt-4">
                        <!-- Student Details Section -->
                        <div class="col-6">
                            <p class="text-black">
                                <span class="font-weight-bolder">Student Number:</span> {{$selectedUser->profile->zppsu_number}} <br>
                                <span class="font-weight-bolder">Student Name:</span> {{$selectedUser->name}} <br>
                                <span class="font-weight-bolder">Birthdate:</span> {{$selectedUser->profile->medical_profile->birthdate}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @php use Carbon\Carbon; @endphp
                                <span class="font-weight-bolder">Age:</span> {{Carbon::parse($selectedUser->profile->medical_profile->birthdate)->age}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="font-weight-bolder">Sex:</span> {{$selectedUser->profile->medical_profile->sex}}
                            </p>
                        </div>
                        <div class="col-6">
                            <p class="text-black">
                                <span class="font-weight-bolder">Course:</span> {{$selectedUser->student_information->program->name}} <br>
                                <span class="font-weight-bolder">College:</span> {{$selectedUser->student_information->program->college->name}} <br>
                                <span class="font-weight-bolder">Campus:</span> {{$selectedUser->student_information->campus->name}}
                            </p>
                        </div>
                    </div>

                    <!-- Medical Results Form -->
                    <form wire:submit="store">
                        @foreach ($availableTests as $testKey)
                            @php
                                $testName = $testDisplayMap[$testKey] ?? ucfirst(str_replace('_', ' ', $testKey));
                                $isBinaryResult = in_array($testKey, ['hepatitis_b', 'drugtest']);
                                $isBloodType = in_array($testKey, ['blood_typing']);
                            @endphp
                            
                            <div class="row mt-2">
                                <div class="col-2">
                                    {{ $testName }}
                                </div>
                                <div class="col-2">
                                    <select wire:model.lazy="tests.{{ $testKey }}.result" class="form-select border border-1 p-2 ps-2">
                                        <option value="">Select Result</option>
                                        @if ($isBinaryResult)
                                            <option value="Positive">Positive</option>
                                            <option value="Negative">Negative</option>
                                        @elseif ($isBloodType)
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        @else
                                            <option value="Normal">Normal</option>
                                            <option value="Abnormal">Abnormal</option>
                                        @endif
                                    </select>
                                    @error("tests.{$testKey}.result")
                                        <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                @if (in_array($tests[$testKey]['result'] ?? '', ['Abnormal', 'Positive']))
                                    <div class="col-3">
                                        <select wire:model.blur="tests.{{ $testKey }}.abnormality" class="form-select border border-1 p-2 ps-2">
                                            <option value="">Select Abnormality</option>
                                            @foreach ($testAbnormalities[$testKey] as $abnormality)
                                                <option value="{{ $abnormality }}">{{ $abnormality }}</option>
                                            @endforeach
                                        </select>
                                        @error("tests.{$testKey}.abnormality")
                                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                                
                                <div class="col-5">
                                    <div class="input-group input-group-outline @if(!empty($tests[$testKey]['remarks'])) is-filled @endif">
                                        <label class="form-label">Remarks</label>
                                        <input wire:model.live="tests.{{ $testKey }}.remarks" type="text" class="form-control">
                                    </div>
                                    @error("tests.{$testKey}.remarks")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <!-- Additional Comments Section -->
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="input-group input-group-outline @if(strlen($condition ?? '') > 0) is-filled @endif">
                                    <textarea wire:model.live="condition" class="form-control" rows="4" placeholder="Enter student's condition"></textarea>
                                </div>
                                @error('condition')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline @if(strlen($additional_comments ?? '') > 0) is-filled @endif">
                                    <textarea wire:model.live="additional_comments" class="form-control" rows="4" placeholder="Additional Comments"></textarea>
                                </div>
                                @error('additional_comments')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>