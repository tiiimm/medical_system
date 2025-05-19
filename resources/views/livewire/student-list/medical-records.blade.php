<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Medical Records</strong></h4>
                    </div>
                </div>
                <div class="me-3 my-3 text-end">
                    {{-- @if(auth()->user()->hasRole('medical staff'))
                    <a class="btn bg-gradient-dark mb-0" wire:click="addNewRecord"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Record</a>
                    @endif --}}
                    @if(auth()->user()->hasRole('medical staff'))
                        <a class="btn bg-gradient-success mb-0" wire:click="printHealthRecord">
                            <i class="material-icons text-sm">print</i>&nbsp;&nbsp;Print Health Record Form
                        </a>
                    @endif
                </div>
                <div class="card-body-fit px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">MEDICAL DATE</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SCHOOL YEAR</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SEMESTER</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CONDITION</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medical_results as $index => $medical_result)
                                <tr>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-sm">{{$index + 1}}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $medical_result->created_at }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $medical_result->school_year }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $medical_result->semester }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $medical_result->condition }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a wire:click="downloadFile('{{ $medical_result['id'] }}')" class="btn btn-success btn-link"
                                            data-original-title="Download Result" title="Download Result">
                                            <i class="material-icons">download</i>
                                        </a>
                                        @if(auth()->user()->hasRole('medical staff'))
                                        <a wire:click="generateCertificate('{{ $medical_result['id'] }}')" class="btn btn-warning btn-link"
                                           data-original-title="Update Status" title="Update Status">
                                            <i class="material-icons">print</i>
                                            <!-- <i class="material-icons">east</i> -->
                                        </a>
                                        @endif
                                        <a wire:click="showDetails('{{ $medical_result['id'] }}')" class="btn btn-secondary btn-link"
                                           data-original-title="Update Status" title="Update Status">
                                            <i class="material-icons">visibility</i>
                                            <!-- <i class="material-icons">east</i> -->
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            <p class="text-sm text-muted my-2">No records found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="medicalDetailsModal" tabindex="-1" aria-labelledby="medicalDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicalDetailsModalLabel">Medical Record Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($selectedMedicalRecord != null)
                <div class="modal-body">
                    <!-- Display the details of the selected medical record -->
                    <p><strong>Medical Date:</strong> {{ $selectedMedicalRecord->created_at }}<br>
                        <strong>School Year:</strong> {{ $selectedMedicalRecord->school_year }}<br>
                        <strong>Semester:</strong> {{ $selectedMedicalRecord->semester }}<br>
                    </p>
                    @if($selectedMedicalRecord->test_results != NULL)
                        @foreach (json_decode($selectedMedicalRecord->test_results, true) as $testName => $result)
                            <p>
                                <strong>{{ $testName }} Result:</strong> {{ $result['result'] }}{{ $result['result'] == 'Normal' ? '' : ', ' }}{{ $result['abnormality'] ?? 'None' }}<br>
                                <strong>{{ $testName }} Remarks:</strong> {{ $result['remarks'] ?? 'None' }}
                            </p>
                        @endforeach
                    @endif
                    <p><strong>General Condition:</strong> {{ $selectedMedicalRecord->condition??'None' }}</p>
                    <p><strong>Additional Comments:</strong> {{ $selectedMedicalRecord->additional_comments??'None' }}</p>
                </div>
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if ($selectedMedicalRecord && $selectedMedicalRecord->result_file_path)
                        <a href="{{ url('/medical-results/view/' . $selectedMedicalRecord->id) }}" 
                        class="btn btn-info" 
                        target="_blank">
                        <i class="material-icons">visibility</i> View All Result Files
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-modal', event => {
        var myModal = new bootstrap.Modal(document.getElementById('medicalDetailsModal'));
        myModal.show();
    });

    window.addEventListener('open-preview-tab', event => {
        const url = event.detail[0].url;
        window.open(url, '_blank'); // open in new tab
    });
</script>
