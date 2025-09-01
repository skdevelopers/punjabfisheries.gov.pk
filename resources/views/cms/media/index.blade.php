<x-app-layout title="Media Library" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div style="padding: 2rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; font-weight: 600; color: #1e293b; margin-bottom: 0.5rem;">Media Library</h1>
            <p style="color: #64748b; font-size: 1rem;">Manage your media files</p>
        </div>
        <button onclick="openUploadModal()" style="display: inline-flex; align-items: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.2s; border: none; cursor: pointer;">
            <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            Upload Files
        </button>
    </div>

    <!-- Upload Modal -->
    <div id="uploadModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: white; border-radius: 0.75rem; padding: 2rem; max-width: 500px; width: 90%; max-height: 90vh; overflow-y: auto;">
            <div style="display: flex; justify-content: between; align-items: center; margin-bottom: 1.5rem;">
                <h2 style="font-size: 1.5rem; font-weight: 600; color: #1e293b; margin: 0;">Upload Files</h2>
                <button onclick="closeUploadModal()" style="background: none; border: none; cursor: pointer; color: #64748b; font-size: 1.5rem;">&times;</button>
            </div>
            
            <form id="uploadForm" enctype="multipart/form-data">
                <div style="border: 2px dashed #d1d5db; border-radius: 0.5rem; padding: 2rem; text-align: center; margin-bottom: 1.5rem;">
                    <svg style="width: 3rem; height: 3rem; color: #64748b; margin-bottom: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p style="color: #64748b; margin-bottom: 0.5rem;">Drag and drop files here, or</p>
                    <input type="file" id="fileInput" multiple accept="image/*,.pdf,.doc,.docx" style="display: none;">
                    <button type="button" onclick="document.getElementById('fileInput').click()" style="background: #3b82f6; color: white; padding: 0.5rem 1rem; border: none; border-radius: 0.375rem; cursor: pointer;">Choose Files</button>
                </div>
                
                <div id="fileList" style="margin-bottom: 1.5rem;"></div>
                
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" style="flex: 1; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 0.5rem; font-weight: 500; cursor: pointer;">Upload Files</button>
                    <button type="button" onclick="closeUploadModal()" style="flex: 1; background: #f3f4f6; color: #374151; padding: 0.75rem 1.5rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-weight: 500; cursor: pointer;">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Search and Filter -->
    <div style="background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e2e8f0; margin-bottom: 1.5rem;">
        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <input type="text" placeholder="Search files..." style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem;">
            </div>
            <select style="padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; background: white;">
                <option value="">All Types</option>
                <option value="image">Images</option>
                <option value="document">Documents</option>
                <option value="video">Videos</option>
            </select>
            <button style="background: #f3f4f6; color: #374151; padding: 0.75rem 1.5rem; border: 1px solid #d1d5db; border-radius: 0.5rem; font-size: 0.875rem; cursor: pointer;">Filter</button>
        </div>
    </div>

    <!-- Media Grid -->
    <div style="background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e2e8f0;">
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.5rem;">
            <!-- Image Item -->
            <div style="border: 1px solid #e2e8f0; border-radius: 0.5rem; overflow: hidden; transition: all 0.2s; cursor: pointer;" onmouseover="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.boxShadow='none'">
                <div style="position: relative;">
                    <img src="/images/600x400.png" alt="Sample image" style="width: 100%; height: 150px; object-fit: cover;">
                    <div style="position: absolute; top: 0.5rem; right: 0.5rem; background: rgba(0, 0, 0, 0.5); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">2.1 MB</div>
                </div>
                <div style="padding: 1rem;">
                    <h3 style="font-size: 0.875rem; font-weight: 500; color: #1e293b; margin-bottom: 0.25rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">sample-image.jpg</h3>
                    <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.75rem;">Uploaded 2 hours ago</p>
                    <div style="display: flex; gap: 0.5rem;">
                        <button onclick="copyUrl('/images/600x400.png')" style="flex: 1; background: #f3f4f6; color: #374151; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">Copy URL</button>
                        <button onclick="deleteFile(1)" style="background: #ef4444; color: white; padding: 0.5rem; border: none; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">
                            <svg style="width: 0.75rem; height: 0.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Document Item -->
            <div style="border: 1px solid #e2e8f0; border-radius: 0.5rem; overflow: hidden; transition: all 0.2s; cursor: pointer;" onmouseover="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.boxShadow='none'">
                <div style="background: #f8fafc; height: 150px; display: flex; align-items: center; justify-content: center;">
                    <svg style="width: 3rem; height: 3rem; color: #64748b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div style="padding: 1rem;">
                    <h3 style="font-size: 0.875rem; font-weight: 500; color: #1e293b; margin-bottom: 0.25rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">document.pdf</h3>
                    <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.75rem;">Uploaded 1 day ago</p>
                    <div style="display: flex; gap: 0.5rem;">
                        <button onclick="copyUrl('/documents/document.pdf')" style="flex: 1; background: #f3f4f6; color: #374151; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">Copy URL</button>
                        <button onclick="deleteFile(2)" style="background: #ef4444; color: white; padding: 0.5rem; border: none; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">
                            <svg style="width: 0.75rem; height: 0.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Another Image -->
            <div style="border: 1px solid #e2e8f0; border-radius: 0.5rem; overflow: hidden; transition: all 0.2s; cursor: pointer;" onmouseover="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.boxShadow='none'">
                <div style="position: relative;">
                    <img src="/images/800x600.png" alt="Another image" style="width: 100%; height: 150px; object-fit: cover;">
                    <div style="position: absolute; top: 0.5rem; right: 0.5rem; background: rgba(0, 0, 0, 0.5); color: white; padding: 0.25rem 0.5rem; border-radius: 0.25rem; font-size: 0.75rem;">1.8 MB</div>
                </div>
                <div style="padding: 1rem;">
                    <h3 style="font-size: 0.875rem; font-weight: 500; color: #1e293b; margin-bottom: 0.25rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">another-image.png</h3>
                    <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.75rem;">Uploaded 3 days ago</p>
                    <div style="display: flex; gap: 0.5rem;">
                        <button onclick="copyUrl('/images/800x600.png')" style="flex: 1; background: #f3f4f6; color: #374151; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">Copy URL</button>
                        <button onclick="deleteFile(3)" style="background: #ef4444; color: white; padding: 0.5rem; border: none; border-radius: 0.25rem; font-size: 0.75rem; cursor: pointer;">
                            <svg style="width: 0.75rem; height: 0.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div style="display: flex; justify-content: center; margin-top: 2rem;">
        <div style="display: flex; gap: 0.5rem; align-items: center;">
            <button style="padding: 0.5rem 1rem; border: 1px solid #d1d5db; background: white; color: #374151; border-radius: 0.375rem; cursor: pointer; font-size: 0.875rem;">Previous</button>
            <button style="padding: 0.5rem 1rem; border: 1px solid #3b82f6; background: #3b82f6; color: white; border-radius: 0.375rem; cursor: pointer; font-size: 0.875rem;">1</button>
            <button style="padding: 0.5rem 1rem; border: 1px solid #d1d5db; background: white; color: #374151; border-radius: 0.375rem; cursor: pointer; font-size: 0.875rem;">2</button>
            <button style="padding: 0.5rem 1rem; border: 1px solid #d1d5db; background: white; color: #374151; border-radius: 0.375rem; cursor: pointer; font-size: 0.875rem;">3</button>
            <button style="padding: 0.5rem 1rem; border: 1px solid #d1d5db; background: white; color: #374151; border-radius: 0.375rem; cursor: pointer; font-size: 0.875rem;">Next</button>
        </div>
    </div>
</div>

<script>
function openUploadModal() {
    document.getElementById('uploadModal').style.display = 'flex';
}

function closeUploadModal() {
    document.getElementById('uploadModal').style.display = 'none';
    document.getElementById('fileList').innerHTML = '';
    document.getElementById('fileInput').value = '';
}

function copyUrl(url) {
    navigator.clipboard.writeText(url).then(function() {
        alert('URL copied to clipboard!');
    });
}

function deleteFile(id) {
    if (confirm('Are you sure you want to delete this file?')) {
        // Here you would make an AJAX call to delete the file
        alert('File deleted successfully!');
    }
}

// File upload handling
document.getElementById('fileInput').addEventListener('change', function(e) {
    const files = e.target.files;
    const fileList = document.getElementById('fileList');
    fileList.innerHTML = '';
    
    for (let file of files) {
        const fileItem = document.createElement('div');
        fileItem.style.cssText = 'display: flex; align-items: center; justify-content: between; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 0.5rem; margin-bottom: 0.5rem;';
        fileItem.innerHTML = `
            <div style="display: flex; align-items: center;">
                <svg style="width: 1.5rem; height: 1.5rem; color: #64748b; margin-right: 0.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <div>
                    <div style="font-weight: 500; color: #1e293b;">${file.name}</div>
                    <div style="font-size: 0.875rem; color: #64748b;">${(file.size / 1024 / 1024).toFixed(2)} MB</div>
                </div>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background: #ef4444; color: white; padding: 0.25rem 0.5rem; border: none; border-radius: 0.25rem; cursor: pointer; font-size: 0.75rem;">Remove</button>
        `;
        fileList.appendChild(fileItem);
    }
});

document.getElementById('uploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    const files = document.getElementById('fileInput').files;
    
    for (let file of files) {
        formData.append('files[]', file);
    }
    
    // Here you would make an AJAX call to upload the files
    alert('Files uploaded successfully!');
    closeUploadModal();
});

// Close modal when clicking outside
document.getElementById('uploadModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeUploadModal();
    }
});
    </script>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
