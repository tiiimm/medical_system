<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>New Medical Result</strong></h4>
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
                        @php
                            $tests = [
                                'Hematology' => [
                                    'model' => 'hematology',
                                    'abnormalities' => [
                                        'Anemia',              
                                        'Leukocytosis',        
                                        'Leukopenia',          
                                        'Thrombocytopenia'     
                                    ]
                                ],
                                'Urinalysis' => [
                                    'model' => 'urinalysis',
                                    'abnormalities' => [
                                        'UTI',                 
                                        'Dehydration',         
                                        'Kidney Disease',      
                                        'Diabetes',            
                                        'Bladder Infection',   
                                        'Proteinuria'          
                                    ]
                                ],
                                'XRay' => [
                                    'model' => 'xray',
                                    'abnormalities' => [
                                        'Tuberculosis',        
                                        'Pneumonia',           
                                        'Broken Bones',        
                                        'Lung Scarring',       
                                        'COPD'                 
                                    ]
                                ],
                                'Drug Test' => [
                                    'model' => 'drugtest',
                                    'abnormalities' => [
                                        'Substance Abuse',     
                                        'Prescription Drug Abuse', 
                                        'Illegal Drug Use'     
                                    ]
                                ]

                            ];
                        @endphp

                        @foreach ($tests as $test => $data)
                            <div class="row mt-2">
                                <div class="col-2">
                                    {{ $test }}
                                </div>
                                <div class="col-2">
                                    <select wire:model.lazy="{{ $data['model'] }}_result" class="form-select border border-1 p-2 ps-2">
                                        <option value="">Select Result</option>
                                        @if ($test != 'Drug Test')
                                        <option value="Normal">Normal</option>
                                        <option value="Abnormal">Abnormal</option>
                                        @else
                                        <option value="Positive">Positive</option>
                                        <option value="Negative">Negative</option>
                                        @endif
                                    </select>
                                    @error($data['model'] . '_result')
                                        <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if (${$data['model'] . '_result'} == 'Abnormal' || ${$data['model'] . '_result'} == 'Positive')
                                    <div class="col-3">
                                        <select wire:model.blur="{{ $data['model'] . '_abnormality' }}" class="form-select border border-1 p-2 ps-2">
                                            <option value="">Select Abnormality</option>
                                            @foreach ($data['abnormalities'] as $abnormality)
                                                <option value="{{ $abnormality }}">{{ $abnormality }}</option>
                                            @endforeach
                                        </select>
                                        @error($data['model'] . '_abnormality')
                                            <p class="text-danger text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-5">
                                    <div class="input-group input-group-outline @if(!empty(${'remarks_' . $data['model']})) is-filled @endif">
                                        <label class="form-label">Remarks</label>
                                        <input wire:model.live="remarks_{{ $data['model'] }}" type="text" class="form-control">
                                    </div>
                                    @error('remarks_' . $data['model'])
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

                        <!-- File Upload Section -->
                        <div class="row mt-4 px-6">
                            <div class="custom-file-upload">
                                <input wire:model="result_file" type="file" class="form-control d-none" id="result_file" accept=".pdf,.jpg,.jpeg,.png">
                                <label for="result_file" class="upload-label">Choose Files</label>
                                <span class="file-name mt-1">
                                    @if($result_file)
                                        {{ $result_file->getClientOriginalName() }}
                                    @else
                                        No file selected
                                    @endif
                                </span>
                            </div>
                            @error('result_file')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
