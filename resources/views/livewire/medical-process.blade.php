<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white mx-3"><strong>Medical Process</strong></h4>
                    </div>
                </div>  
                <div class="container-fluid mx-2">           
                    
                    

                    @if($status == 'Waiting for result')
                        <form wire:submit="store"> 
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
