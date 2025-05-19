<h1 class="text-3xl font-bold text-gray-800 mb-8 px-4 sm:px-6 pt-6">Medical Results</h1>

<!-- Add this in your head section -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    .main-container {
        padding: 20px;
        max-width: 1800px;
        margin: 0 auto;
    }
    
    .thumb-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 24px;
        padding: 0 10px;
    }
    
    .thumb-wrapper {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    
    .thumb {
        position: relative;
        width: 100%;
        aspect-ratio: 1/1;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8fafc;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .thumb:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .thumb:hover img {
        transform: scale(1.05);
    }
    
    .file-name {
        font-size: 13px;
        color: #334155;
        text-align: center;
        padding: 0 4px;
        word-break: break-word;
        line-height: 1.3;
    }
    
    .file-type-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 10px;
        text-transform: uppercase;
    }
    
    /* Modal styles */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        padding: 20px;
    }
    
    .modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    
    .modal-container {
        width: 100%;
        max-width: 1200px;
        max-height: 90vh;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transform: scale(0.9);
        transition: transform 0.3s ease;
    }
    
    .modal-overlay.active .modal-container {
        transform: scale(1);
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .modal-close {
        cursor: pointer;
        font-size: 24px;
        color: #64748b;
        transition: color 0.2s;
    }
    
    .modal-close:hover {
        color: #334155;
    }
    
    .modal-content {
        height: calc(90vh - 60px);
        overflow: auto;
        padding: 20px;
        position: relative;
    }
    
    .pdf-viewer {
        width: 100%;
        height: 100%;
        min-height: 500px;
        border: none;
    }
    
    .download-btn {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: #3b82f6;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s;
    }
    
    .download-btn:hover {
        background: #2563eb;
    }
</style>

<div class="main-container">
    <div class="thumb-container">
        @foreach ($files as $file)
            @php
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $url = asset('storage/' . $file);
                $filename = basename($file);
            @endphp

            <div class="thumb-wrapper">
                <div class="thumb" onclick="openFile('{{ $url }}', '{{ $ext }}', '{{ $filename }}')">
                    @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                        <img src="{{ $url }}" alt="Thumbnail">
                    @elseif ($ext === 'pdf')
                        <div class="text-center p-4">
                            <i class="ri-file-pdf-line" style="font-size: 48px; color: #e53935;"></i>
                        </div>
                    @else
                        <div class="text-center p-4">
                            <i class="ri-file-line" style="font-size: 48px; color: #64748b;"></i>
                        </div>
                    @endif
                    <span class="file-type-badge">{{ $ext }}</span>
                </div>
                <div class="file-name">{{ $filename }}</div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal for viewing file -->
<div id="fileViewerModal" class="modal-overlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalFileName" class="font-medium text-gray-800"></h3>
            <span class="modal-close" onclick="closeViewer()">&times;</span>
        </div>
        <div class="modal-content">
            <div id="fileContent"></div>
            <a id="downloadBtn" class="download-btn" href="#" download>
                <i class="ri-download-line mr-1"></i> Download
            </a>
        </div>
    </div>
</div>

<script>
    function openFile(url, ext, filename) {
        const modal = document.getElementById('fileViewerModal');
        const content = document.getElementById('fileContent');
        const fileNameElement = document.getElementById('modalFileName');
        const downloadBtn = document.getElementById('downloadBtn');
        
        fileNameElement.textContent = filename;
        downloadBtn.href = url;
        
        if (['jpg', 'jpeg', 'png'].includes(ext)) {
            content.innerHTML = `
                <div class="flex justify-center">
                    <img src="${url}" class="max-w-full max-h-[80vh] object-contain" alt="${filename}">
                </div>
            `;
        } else if (ext === 'pdf') {
            content.innerHTML = `
                <embed src="${url}" class="pdf-viewer" type="application/pdf">
            `;
        } else {
            content.innerHTML = `
                <div class="flex flex-col items-center justify-center h-full">
                    <i class="ri-file-line" style="font-size: 64px; color: #64748b;"></i>
                    <p class="mt-4 text-gray-600">Preview not available</p>
                </div>
            `;
        }
        
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeViewer() {
        const modal = document.getElementById('fileViewerModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    
    // Close modal when clicking outside content
    document.getElementById('fileViewerModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeViewer();
        }
    });
</script>