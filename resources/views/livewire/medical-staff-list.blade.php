<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Medical Staffs List</strong></h6>
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
                            <a wire:click="addMedicalStaff()" class="btn bg-gradient-dark mb-0" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Staff
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
                                        ID NUMBER</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NAME</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        EMAIL</th>
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
                                @forelse ($users as $index => $user)
                                <tr>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-sm">{{$index + 1}}</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">
                                                {{ $user->profile ? $user->profile->zppsu_number : 'No Profile Available' }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $user->is_active?'Active':'Deactivated' }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs text-secondary mb-0">{{ $user->created_at }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a wire:click="showDetails('{{ $user->id }}')" rel="tooltip" class="btn btn-secondary btn-link"
                                            data-original-title=""
                                            title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                        @if($user->is_active)
                                            <a wire:click="confirmDeactivation('{{ $user->id }}')" class="btn btn-warning btn-link"
                                            data-original-title="Update Status" title="Update Status">
                                                <i class="material-icons">block</i>
                                            </a>
                                        @else
                                            <a wire:click="confirmReactivation('{{ $user->id }}')" class="btn btn-success btn-link"
                                            data-original-title="Update Status" title="Update Status">
                                                <i class="material-icons">check</i>
                                            </a>
                                        @endif
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
</div>
<script>
    window.addEventListener('showConfirmation', function(event) {

        const { message, callback, userId } = event.detail[0];

        if (confirm(message)) {
            @this.call(callback, userId);
        }
    });
</script>