<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Students List</strong></h6>
                    </div>
                </div>

                <!-- Filter and Search Section -->
                <div class="row mb-3 mx-3 my-3 pb-2">
                    <!-- Campus Filter -->
                    <div class="col-12 col-md-4">
                        <div class="relative">
                            <select wire:model.live="campus_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="campus">
                                <option value="0" disabled selected class="placeholder">Select Campus</option>
                                @foreach($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                @endforeach
                            </select>
                            @error('campus_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Program Filter -->
                    <div class="col-12 col-md-4">
                        <div class="relative">
                            <select wire:model.live="program_id" class="form-select border border-1 p-2 px-2-5" data-style="select-with-transition" title="" data-size="100" id="program">
                                <option value="0" disabled selected class="placeholder">Select Program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Search with Button -->
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
                </div>

                <!-- Add New Record Button -->
                <div class="me-3 my-3 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="javascript:;">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Student
                    </a>
                </div>

                <!-- Table -->
                <div class="card-body-fit px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 8%;">STUDENT NUMBER</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NAME</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 8%;">EMAIL</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CAMPUS</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PROGRAM</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="align-middle text-center">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm">{{ $index + 1 }}</p>
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
                                            <p class="text-xs text-secondary mb-0">{{ $user->student_information->campus->name }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-xs text-secondary mb-0">{{ $user->student_information->program->abbreviation }}</p>
                                        </td>
                                        <td class="align-middle">
                                            {{-- <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a> --}}
                                            {{-- <a wire:click="openModal('{{ $user['id'] }}')" class="btn btn-warning btn-link" data-original-title="View Details" title="View Details">
                                                <i class="material-icons">search</i>
                                            </a> --}}
                                            <a wire:click="showDetails('{{ $user['id'] }}')" class="btn btn-success btn-link" data-original-title="Update Status" title="Update Status">
                                                <i class="material-icons">east</i>
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

                <!-- Pagination Links -->
                <div class="card-footer d-flex justify-content-center">
                    <nav>
                        <ul class="pagination pagination-sm">
                            @if ($users->onFirstPage())
                                <li class="page-item disabled"><span class="page-link"><</span></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous"><</a>
                                </li>
                            @endif

                            @foreach ($users->links()->elements[0] as $page => $url)
                                <li class="page-item {{ ($page == $users->currentPage()) ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">></a>
                                </li>
                            @else
                                <li class="page-item disabled"><span class="page-link">></span></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>