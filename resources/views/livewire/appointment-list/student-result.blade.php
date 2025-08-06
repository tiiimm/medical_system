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
                    <!-- Medical Results Form -->
                    <span class="text-black mx-0">Note: Don't submit results until you've completed the medical process. You may upload 1 or more files either image or PDF as long as each file size does not exceed 3MB</span>
                    <form wire:submit="store"> 
                        <!-- File Upload Section -->
                        <div class="row mt-4 px-6">
                            <div class="custom-file-upload">
                                <input wire:model="result_files" type="file" class="form-control d-none" id="result_files" accept=".pdf,.jpg,.jpeg,.png" multiple>
                                <label for="result_files" class="upload-label">Choose Files</label>
                                <span class="file-name mt-1">
                                    @if ($result_files && count($result_files) > 0)
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($result_files as $file)
                                                <li>{{ $file->getClientOriginalName() }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No file selected
                                    @endif
                                </span>
                            </div>
                            @error('result_files')
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
