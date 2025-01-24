<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Program List</strong></h6>
                    </div>
                </div>

                <!-- Filter and Search Section -->
                <div class="row mb-3 mx-3 my-3 pb-2">

                    <!-- search with Button -->
                    <div class="col-12 col-md-6">
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex">
                            <div class="input-group input-group-outline @if(strlen($search ?? '') > 0) is-filled @endif">
                                <input wire:model.live="search" type="text" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        @error('search')
                            <p class="text-danger inputerror">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 col-md-2">
                        <a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#programModal" wire:click="addModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Program
                        </a>
                    </div>
                </div>

                <!-- Add New Record Button -->
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
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        COLLEGE</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 300px;">
                                        PROGRAM</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ABBREVIATION</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        DURATION</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STATUS
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        CREATION DATE
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programs as $index => $program)
                                <tr>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-sm">{{$index + 1}}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $program->college->abbreviation }}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $program->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $program->abbreviation }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $program->duration_years }} years</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $program->is_active?'Active':'Deactivated' }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $program->created_at }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a wire:click="programDetails('{{ $program->id }}')" rel="tooltip" class="btn btn-secondary btn-link"
                                            data-original-title=""
                                            title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        @if($program->is_active)
                                            <a wire:click="deactivateProgram('{{ $program->id }}')" wire:confirm="Are you sure you want to deactivate this program?" class="btn btn-warning btn-link"
                                            data-original-title="Update Status" title="Update Status">
                                                <i class="material-icons">block</i>
                                            </a>
                                        @else
                                            <a wire:click="reactivateProgram('{{ $program->id }}')" wire:confirm="Are you sure you want to reactivate this program?" class="btn btn-success btn-link"
                                            data-original-title="Update Status" title="Update Status">
                                                <i class="material-icons">check</i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
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
                    <div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="programModalLabel">{{ $edit?'Edit Program':'Add New Program' }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form wire:submit.prevent="{{ $edit ? 'updateProgram' : 'addProgram' }}">
                                        <div class="row">    
                                            <div class="mb-3 col-lg-7">
                                                <label for="programName" class="form-label">Program Name</label>
                                                <div class="input-group input-group-outline @if(strlen($programName ?? '') > 0) is-filled @endif">
                                                    <input wire:model="name" type="text" class="form-control" id="programName" placeholder="Enter program name">
                                                </div>
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3 col-lg-5">
                                                <label for="programAbbreviation" class="form-label">Program Abbreviation</label>
                                                <div class="input-group input-group-outline @if(strlen($programAbbreviation ?? '') > 0) is-filled @endif">
                                                    <input wire:model="abbreviation" type="text" class="form-control" id="programAbbreviation" placeholder="Enter abbreviation">
                                                </div>
                                                @error('abbreviation') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="programDescription" class="form-label">Program Description</label>
                                            <div class="input-group input-group-outline @if(strlen($programDescription ?? '') > 0) is-filled @endif">
                                                <input wire:model="description" type="text" class="form-control" id="programDescription" placeholder="Enter description">
                                            </div>
                                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="programCollege" class="form-label">College</label>
                                            <select wire:model="college_id" class="form-select" id="programCollege">
                                                @foreach($colleges as $college)
                                                    <option value="{{ $college->id }}">{{ $college->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('college_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="row align-items-end">
                                            <div class="mb-3 col-lg-8">
                                                <label for="programStatus" class="form-label">Status</label>
                                                <select wire:model="is_active" class="form-select" id="programStatus">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactivated</option>
                                                </select>
                                                @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3 col-lg-4">
                                                <label for="programDuration" class="form-label">Duration (yrs)</label>
                                                <div class="input-group input-group-outline">
                                                    <input 
                                                        wire:model="duration_years" 
                                                        type="number" 
                                                        class="form-control" 
                                                        id="programDuration" 
                                                        placeholder="Duration (yrs)" 
                                                        min="1" 
                                                        step="1">
                                                </div>
                                                @error('duration_years') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ $edit?'Update Program':'Save Program' }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    window.addEventListener('closeModal', function () {document.querySelector('#programModal .btn-close').click();});

    window.addEventListener('showModal', function(event) {
        new bootstrap.Modal(document.getElementById('programModal')).show();
    });

</script>
@endscript