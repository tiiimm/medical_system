<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Appointment List</strong></h6>
                    </div>
                </div>
                @if(auth()->check() && !auth()->user()->hasRole('student'))
                    <div class="row align-items-center justify-content-end mb-3">
                        <div class="col-auto">
                            <div class="form-check form-switch d-flex align-items-center me-3">
                                <input class="form-check-input" type="checkbox" id="toggle" wire:click="toggleShowTodayOnly">
                                <label class="form-check-label mb-0 ms-2" for="toggle">Show Today Only</label>
                            </div>
                        </div>
                        <div class="col-auto me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Record
                            </a>
                        </div>
                    </div>
                @endif
                <div class="card-body-fit px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:10%;">
                                        DATE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:5%;">
                                        APT #NO</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:10%;">
                                        STUDENT NUMBER</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NAME</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CONTACT NUMBER</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        COURSE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STATUS</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $index => $appointment)
                                <tr>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-sm">{{$index + 1}}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-xs">{{ $appointment->appointment_date }} {{ $appointment->appointment_schedule }}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-xs">{{ $appointment->appointment_number }}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $appointment->student_number }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $appointment->user->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $appointment->user->profile->contact_number }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $appointment->student_information->program->abbreviation }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $appointment->status }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <!-- Update Status Button -->
                                        @if(auth()->check() && auth()->user()->hasRole('student'))
                                        <a wire:click="uploadResults('{{ $appointment['id'] }}')" class="btn btn-secondary btn-link"
                                           data-original-title="Upload Results" title="Upload Results">
                                            <i class="material-icons">upload</i>
                                        </a>
                                        @endif
                                        @if(auth()->check() && !auth()->user()->hasRole('student') && $appointment['status'] != 'Result Posted')
                                        <a wire:click="openStatusUpdateModal('{{ $appointment['id'] }}')" class="btn btn-warning btn-link"
                                           data-original-title="Update Status" title="Update Status">
                                            <i class="material-icons">update</i>
                                        </a>
                                        @endif
                                        @if(auth()->check() && auth()->user()->hasRole('medical staff'))
                                        <a wire:click="showDetails('{{ $appointment['id'] }}')" class="btn btn-secondary btn-link"
                                           data-original-title="Update Status" title="Update Status">
                                            <i class="material-icons">east</i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStatusModalLabel">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="relative">
                        <select wire:model="status" class="form-select border border-1 p-2 ps-2" data-style="select-with-transition" title="" data-size="100" id="status">
                            <option value="">Select Status</option>
                            <option value="Done Drug Test">Done Drug Test</option>
                            <option value="Done Chest X-Ray">Done Chest X-Ray</option>
                            @if($appointment?->student_information->year_level == '1st year')<option value="Done Blood Test">Done Blood Test</option>@endif
                            @if($appointment?->student_information->major->food_related)
                                <option value="Done Hepatitis A">Done Hepatitis A</option>
                                <option value="Done Stool Exam">Done Stool Exam</option>
                            @endif
                            {{-- <option value="Done Urinalysis">Done Urinalysis</option> --}}
                            <option value="Waiting for result">Waiting for result</option>
                            <option value="Result Posted">Result Posted</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="updateStatus" class="btn btn-primary">Update Status</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('showModal', () => {
            const myModalElement = document.getElementById('updateStatusModal');
            const myModal = new bootstrap.Modal(myModalElement);
            myModal.show();
        });
            Livewire.on('closeModal', () => {
                const myModalElement = document.getElementById('updateStatusModal');
                const myModal = new bootstrap.Modal(myModalElement);
                myModal.hide();
            });
    });


</script>
