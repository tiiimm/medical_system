<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Edit System Settings</strong></h4>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if(session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="updateSettings">
                        <div class="form-check mt-4 px-0">
                            <input class="form-check-input" type="checkbox" wire:model.lazy="allow_booking" id="allow_booking">
                            <label class="form-check-label" for="allow_booking">
                                Booking appointments is {{ $allow_booking?'enabled':'disabled' }}
                            </label>
                        </div>
                        @error('allow_booking')
                        <p class='text-danger inputerror'>{{ $message }}</p>
                        @enderror

                        <div class="row">
                            <div class="col-6">
                                <div class="relative">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select wire:model="semester" id="semester" class="form-select border border-1 p-2 px-2-5" required>
                                        <option value="" disabled selected>Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                    </select>
                                    @error('semester')
                                    <p class='text-danger inputerror'>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-3">
                                <label for="sy_start" class="form-label">School Year Start</label>
                                <div class="input-group input-group-outline @if(strlen($sy_start ?? '') > 0) is-filled @endif">
                                    <input wire:model="sy_start" type="number" class="form-control" min="1900" max="{{ date('Y') + 1 }}" step="1" placeholder="Enter Year" required wire:change="updateSyEnd">
                                </div>
                                @error('sy_start')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-3">
                                <label for="sy_end" class="form-label">School Year End</label>
                                <div class="input-group input-group-outline @if(strlen($sy_end ?? '') > 0) is-filled @endif">
                                    <input wire:model="sy_end" type="text" class="form-control" min="1900" max="{{ date('Y') + 1 }}" step="1" disabled>
                                </div>
                                @error('sy_end')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="semester" class="form-label">Medical Start Date</label>
                                <div class="input-group input-group-outline @if(strlen($medical_start ?? '') > 0) is-filled @endif">
                                    <input wire:model="medical_start" type="date" class="form-control" required>
                                </div>
                                @error('medical_start')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-5">
                                <label for="semester" class="form-label">Medical End Date</label>
                                <div class="input-group input-group-outline @if(strlen($medical_end ?? '') > 0) is-filled @endif">
                                    <input wire:model="medical_end" type="date" class="form-control" required>
                                </div>
                                @error('medical_end')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-2">
                                <label for="slots" class="form-label">Slots per AM/PM</label>
                                <div class="input-group input-group-outline @if(strlen($slots ?? '') > 0) is-filled @endif">
                                    <input wire:model="slots" type="number" class="form-control" min="100" max="500" step="1" placeholder="Enter Slots per AM/PM" required>
                                </div>
                                @error('slots')
                                <p class='text-danger inputerror'>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
