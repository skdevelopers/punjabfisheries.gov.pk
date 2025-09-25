<x-app-layout title="Edit Blog Post" is-header-blur="true">
  <!-- Main Content Wrapper -->
  <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="wpBuilder()" x-init="init()">
    <div class="mt-4 sm:mt-5 lg:mt-6">
      <!-- Header -->
      <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100">Edit Blog Post</h1>
          <p class="text-slate-500 dark:text-slate-300">Update your blog post content</p>
        </div>
        <div class="mt-3 flex space-x-2">
          <a href="{{ route('cms.blog.show', $post) }}" class="inline-flex items-center rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
            View Post
          </a>
          <a href="{{ route('cms.blog.index') }}" class="inline-flex items-center rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
            ← Back to Posts
          </a>
        </div>
      </div>

      <form action="{{ route('cms.blog.update', $post) }}" method="POST" enctype="multipart/form-data" id="blogForm" @submit="syncBeforeSubmit">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
          <!-- MAIN -->
          <div class="space-y-6 lg:col-span-3">
            <!-- Title -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Post Title <span class="text-red-500">*</span></label>
              <input id="title" name="title" value="{{ old('title', $post->title) }}" required
                     class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 outline-none ring-0 placeholder:text-slate-400 focus:border-blue-600 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100"
                     placeholder="Enter post title" @input="maybeFillMetaAndExcerpt">
              @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Editor -->
            <div class="rounded-lg border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
              <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Content <span class="text-red-500">*</span></label>
              <div class="ql-header-filled w-full">
                <div id="quill-editor" class="min-h-[420px]" x-init="initQuillEditor()"></div>
              </div>
              <textarea id="content" name="content" class="hidden">{{ old('content', $post->content) }}</textarea>
              @error('content') <p class="px-4 pb-4 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Excerpt -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Excerpt</label>
              <textarea id="excerpt" name="excerpt" rows="3"
                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 outline-none ring-0 placeholder:text-slate-400 focus:border-blue-600 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100"
                        placeholder="Brief description of the post">{{ old('excerpt', $post->excerpt) }}</textarea>
              @error('excerpt') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
          </div>

          <!-- SIDEBAR -->
          <div class="space-y-6">
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Publish Settings</h3>
              <div class="space-y-4">
                <div>
                  <label class="mb-1 block text-sm font-medium">Status</label>
                  <select id="status" name="status"
                          class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    <option value="draft" {{ old('status', $post->status)=='draft'?'selected':'' }}>Draft</option>
                    <option value="published" {{ old('status', $post->status)=='published'?'selected':'' }}>Published</option>
                    <option value="archived" {{ old('status', $post->status)=='archived'?'selected':'' }}>Archived</option>
                  </select>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Publish Date</label>
                  <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $post->is_featured)?'checked':'' }}
                         class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600">
                  <span class="text-sm">Featured Post</span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" id="allow_comments" name="allow_comments" value="1" {{ old('allow_comments', $post->allow_comments)?'checked':'' }}
                         class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600">
                  <span class="text-sm">Allow Comments</span>
                </label>
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Categorization</h3>
              <div class="space-y-4">
                <div>
                  <label class="mb-1 block text-sm font-medium">Category</label>
                  <select id="category_id" name="category_id"
                          class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id', $post->category_id)==$category->id?'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Tags</label>
                  <select id="tags" name="tags[]" multiple size="6"
                          class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))?'selected':'' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                  <p class="mt-1 text-xs text-slate-500">Hold Ctrl/Cmd to select multiple tags</p>
                </div>
              </div>
            </div>

            <!-- Featured Image Section -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Featured Image</h3>
              
                @if($post->getFirstMedia('featured_image'))
                  <!-- Current Featured Image -->
                  <div class="relative group">
                    <img src="{{ $post->getFirstMedia('featured_image')->getUrl() }}" alt="Current featured image" class="w-full h-48 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 rounded-lg flex items-center justify-center">
                      <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex gap-2">
                      <button type="button" onclick="openImageModal()" 
                              class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                          Change Image
                        </button>
                      <button type="button" onclick="removeImage()" 
                                class="bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                          Remove
                        </button>
                      </div>
                    </div>
                  </div>
                @else
                <!-- Upload Area -->
                <div id="image-upload-area" class="border-2 border-dashed border-slate-300 rounded-lg p-6 text-center hover:border-slate-400 transition-colors cursor-pointer" 
                     onclick="openImageModal()">
                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-slate-600 mb-2">Set featured image</p>
                    <p class="text-sm text-slate-500">Click to upload an image or choose from gallery</p>
                  </div>
                @endif

                <!-- New Image Preview -->
              <div id="image-preview-area" class="hidden">
                <div class="relative">
                  <img id="image-preview" src="" alt="Featured Image Preview" 
                       class="w-full h-48 object-cover rounded-lg border border-slate-200 dark:border-slate-700"
                       style="display: block !important; width: 100% !important; height: 192px !important; object-fit: cover !important; background-color: transparent !important;">
                  
                  <!-- Action Buttons Below Image -->
                  <div class="mt-3 flex gap-2 justify-center">
                    <button type="button" onclick="openImageModal()" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                        Change Image
                      </button>
                    <button type="button" onclick="removeImage()" 
                            class="bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-700 transition-colors">
                        Remove
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Hidden File Input -->
                <input type="file" id="featured_image" name="featured_image" accept="image/*" class="hidden">
              <input type="hidden" id="selected_image_url" name="selected_image_url">
            </div>


            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">SEO Settings</h3>
              <div class="space-y-4">
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Title</label>
                  <input id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Description</label>
                  <textarea id="meta_description" name="meta_description" rows="3"
                            class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">{{ old('meta_description', $post->meta_description) }}</textarea>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Keywords</label>
                  <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <div class="space-y-3">
                <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                  Update Post
                </button>
                <button type="button" @click="openPreview"
                        class="inline-flex w-full items-center justify-center rounded-md border border-slate-200 bg-white px-4 py-2 text-slate-800 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                  Preview
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>

  <!-- Media Library Modal -->
  <div id="mediaLibraryModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-lg max-w-6xl max-h-[90vh] w-full overflow-hidden shadow-2xl">
      <!-- Modal Header -->
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Select Featured Image</h3>
        <button onclick="closeMediaLibraryModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 p-1">
          <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Tabs -->
      <div class="border-b border-slate-200 dark:border-slate-700">
        <nav class="flex space-x-8 px-4" aria-label="Tabs">
          <button onclick="switchMediaTab('upload')" id="mediaUploadTab" 
                  class="py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400">
            Upload New
          </button>
          <button onclick="switchMediaTab('library')" id="mediaLibraryTab" 
                  class="py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300">
            Media Library
          </button>
        </nav>
      </div>

      <!-- Tab Content -->
      <div class="flex-1 overflow-hidden">
        
        <!-- Upload Tab -->
        <div id="mediaUploadTabContent" class="p-6">
          <form id="mediaUploadForm" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Select Gallery</label>
              <select name="gallery_id" id="mediaGallerySelect" required class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                <option value="">Choose a gallery...</option>
              </select>
                </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Choose Files</label>
              <input type="file" name="files[]" id="mediaFileInput" multiple accept="image/*" required class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-focus">
              <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Maximum file size: 10MB per file</p>
              </div>
            <input type="hidden" name="collection_name" value="images">
            <div id="mediaUploadProgress" class="hidden">
              <div class="w-full bg-slate-200 rounded-full h-2.5 dark:bg-slate-700">
                <div class="bg-primary h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
          </div>
            <div class="flex justify-end">
              <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary">
                Upload Files
              </button>
            </div>
          </form>
        </div>

        <!-- Library Tab -->
        <div id="mediaLibraryTabContent" class="p-6 hidden">
          <div class="mb-4">
            <div class="flex items-center space-x-4">
              <div class="flex-1">
                <input type="text" id="mediaSearch" placeholder="Search media..." 
                       class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
              </div>
              <select id="mediaFilter" class="px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                  <option value="">All media items</option>
                <option value="images">Images only</option>
                </select>
              </div>
            </div>
            
            <!-- Loading State -->
          <div id="mediaLoading" class="text-center py-8 hidden">
              <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Loading media...</p>
            </div>

            <!-- Empty State -->
          <div id="mediaEmpty" class="text-center py-8 hidden">
            <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            <p class="text-slate-600 mb-2">No media files found</p>
            <p class="text-sm text-slate-500">Upload some files to get started</p>
            </div>

          <!-- Media Grid -->
          <div id="mediaGrid" class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            <!-- Images will be loaded here -->
          </div>
        </div>
      </div>

      <!-- Modal Footer -->
      <div class="flex items-center justify-between p-4 border-t border-slate-200 dark:border-slate-700">
        <div class="flex items-center space-x-2">
          <button id="selectMediaBtn" onclick="selectMediaImage()" disabled
                  class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
            Select Image
          </button>
        </div>
        <button onclick="closeMediaLibraryModal()" 
                class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300">
          Cancel
        </button>
      </div>
    </div>
  </div>

  <script>
    function wpBuilder(){
      return {
        // state
        featuredPreview: null,
        bannerPreview: null,
        quillEditor: null,

        init(){
          // previews with guard to prevent multiple bindings
          this.bindFeaturedImageOnce();
          this.bindBannerImageOnce();
          
          // Make instance globally available for modal
          window.wpBuilderInstance = this;
        },

        bindFeaturedImageOnce() {
          if (this.__featuredBound) return;
          this.__featuredBound = true;
          
          const f = document.getElementById('featured_image');
          if (f) {
            f.addEventListener('change', e => {
              this.readPreview(e, 'featuredPreview');
              // Close any open modal and reset state
              closeGalleryModal?.();
              window.selectedGalleryImage = null;
              document.getElementById('selectImageBtn')?.setAttribute('disabled', 'true');
            }, { once: false });
          }
        },

        bindBannerImageOnce() {
          if (this.__bannerBound) return;
          this.__bannerBound = true;
          
          const b = document.getElementById('banner_image');
          if (b) {
            b.addEventListener('change', e => {
              this.readPreview(e, 'bannerPreview');
              // Close any open modal and reset state
              closeGalleryModal?.();
              window.selectedGalleryImage = null;
              document.getElementById('selectImageBtn')?.setAttribute('disabled', 'true');
            }, { once: false });
          }
        },

        initQuillEditor(){
          if (this.quillEditor) return;
          
          this.quillEditor = new Quill('#quill-editor', {
            modules: {
              toolbar: {
                container: [
                  ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                  ['blockquote', 'code-block'],
                  [{ header: 1 }, { header: 2 }], // custom button values
                  [{ list: 'ordered' }, { list: 'bullet' }],
                  [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
                  [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
                  [{ direction: 'rtl' }], // text direction
                  [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
                  [{ header: [1, 2, 3, 4, 5, 6, false] }],
                  [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                  [{ font: [] }],
                  [{ align: [] }],
                  ['image', 'link'], // image and link buttons
                  ['clean'], // remove formatting button
                ],
                handlers: {
                  'image': this.imageHandler.bind(this)
                }
              }
            },
            placeholder: 'Enter your content...',
            theme: 'snow',
          });

          // Load existing content
          const content = document.getElementById('content').value;
          if (content) {
            this.quillEditor.root.innerHTML = content;
          }

          // Sync content to hidden textarea on change
          this.quillEditor.on('text-change', () => {
            this.syncHTML();
          });
        },

        imageHandler() {
          // Focus on editor before opening modal
          this.quillEditor.focus();
          // Open media library modal for image selection
          openImageModal();
        },

        openImageModal() {
          // Create modal for image selection
          const modal = document.createElement('div');
          modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
          modal.innerHTML = `
            <div class="bg-white rounded-lg p-6 max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-800">Insert Image</h3>
                <button onclick="window.wpBuilderInstance.closeImageModal()" class="text-slate-400 hover:text-slate-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              
              <div class="space-y-4">
                <!-- Upload New Image -->
                <div class="border-2 border-dashed border-slate-300 rounded-lg p-6 text-center">
                  <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  <p class="text-slate-600 mb-2">Upload a new image</p>
                  <input type="file" id="imageUpload" accept="image/*" class="hidden">
                  <button onclick="document.getElementById('imageUpload').click()" class="btn bg-primary text-white hover:bg-primary-focus">
                    Choose Image
                  </button>
                </div>
                
                <!-- Image URL -->
                <div>
                  <label class="block text-sm font-medium text-slate-700 mb-2">Or enter image URL</label>
                  <input type="url" id="imageUrl" placeholder="https://example.com/image.jpg" 
                         class="w-full rounded-md border border-slate-300 px-3 py-2 focus:border-blue-600 focus:outline-none">
                </div>
                
                <!-- Alt Text -->
                <div>
                  <label class="block text-sm font-medium text-slate-700 mb-2">Alt Text (optional)</label>
                  <input type="text" id="imageAlt" placeholder="Describe the image" 
                         class="w-full rounded-md border border-slate-300 px-3 py-2 focus:border-blue-600 focus:outline-none">
                </div>
                
                <!-- Preview -->
                <div id="imagePreview" class="hidden">
                  <label class="block text-sm font-medium text-slate-700 mb-2">Preview</label>
                  <img id="previewImg" class="max-w-full h-auto rounded-lg border" alt="Preview">
                </div>
              </div>
              
              <div class="flex justify-end space-x-3 mt-6">
                <button onclick="window.wpBuilderInstance.closeImageModal()" class="btn bg-slate-150 text-slate-800 hover:bg-slate-200">
                  Cancel
                </button>
                <button onclick="window.wpBuilderInstance.insertImageFromModal()" class="btn bg-primary text-white hover:bg-primary-focus">
                  Insert Image
                </button>
              </div>
            </div>
          `;
          
          document.body.appendChild(modal);
          
          // Handle file upload
          document.getElementById('imageUpload').addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = (e) => {
                document.getElementById('imageUrl').value = e.target.result;
                this.showImagePreview(e.target.result);
              };
              reader.readAsDataURL(file);
            }
          });
          
          // Handle URL input
          document.getElementById('imageUrl').addEventListener('input', (e) => {
            if (e.target.value) {
              this.showImagePreview(e.target.value);
            } else {
              document.getElementById('imagePreview').classList.add('hidden');
            }
          });
        },

        showImagePreview(url) {
          const preview = document.getElementById('imagePreview');
          const img = document.getElementById('previewImg');
          img.src = url;
          preview.classList.remove('hidden');
        },

        insertImageFromModal() {
          const url = document.getElementById('imageUrl').value;
          const alt = document.getElementById('imageAlt').value || '';
          
          if (url) {
            // Get current selection or set to end of content
            let range = this.quillEditor.getSelection();
            if (!range) {
              // If no selection, insert at the end
              range = { index: this.quillEditor.getLength() };
            }
            
            // Insert the image
            this.quillEditor.insertEmbed(range.index, 'image', url, 'user');
            
            // Move cursor after the image
            this.quillEditor.setSelection(range.index + 1);
            
            // Add alt text if provided
            if (alt) {
              setTimeout(() => {
                const img = this.quillEditor.root.querySelector('img[src="' + url + '"]');
                if (img) {
                  img.alt = alt;
                }
              }, 100);
            }
          }
          
          // Close modal and focus back to editor
          const modal = document.querySelector('.fixed.inset-0');
          if (modal) {
            modal.remove();
          }
          setTimeout(() => {
            this.quillEditor.focus();
          }, 100);
        },

        closeImageModal() {
          const modal = document.querySelector('.fixed.inset-0');
          if (modal) {
            modal.remove();
          }
          setTimeout(() => {
            this.quillEditor.focus();
          }, 100);
        },

        syncHTML(){
          if (this.quillEditor) {
            document.getElementById('content').value = this.quillEditor.root.innerHTML;
          }
        },

        syncBeforeSubmit(){ 
          this.syncHTML(); 
        },

        readPreview(e,key){
          const f = e.target.files?.[0]; if (!f) return;
          const r = new FileReader(); r.onload = ev => { this[key] = ev.target.result; };
          r.readAsDataURL(f);
        },

        maybeFillMetaAndExcerpt(ev){
          const t = ev.target.value;
          const mt = document.getElementById('meta_title');
          const ex = document.getElementById('excerpt');
          if (mt && !mt.value) mt.value = t;
          if (ex && !ex.value) ex.value = t;
        },

        // Preview
        openPreview(){
          this.syncHTML();
          const form = new FormData(document.getElementById('blogForm'));
          const data = {
            title: form.get('title'),
            content: this.quillEditor ? this.quillEditor.root.innerHTML : '',
            excerpt: form.get('excerpt'),
            category: form.get('category_id'),
            tags: form.getAll('tags[]'),
            meta_title: form.get('meta_title'),
            meta_description: form.get('meta_description'),
            meta_keywords: form.get('meta_keywords')
          };
          localStorage.setItem('blogPreview', JSON.stringify(data));
          window.open('{{ url("/cms/blog/preview") }}', '_blank');
        },
      }
    }

    // Image removal functions
    function removeImage() {
      // Hide the image preview and show upload area
      const previewArea = document.getElementById('image-preview-area');
      const previewImg = document.getElementById('image-preview');
      const uploadArea = document.getElementById('image-upload-area');
      
      if (previewArea && previewImg && uploadArea) {
        previewImg.src = '';
        previewArea.classList.add('hidden');
        uploadArea.style.display = 'block';
        console.log('Image removed');
      }
      
      // Clear the stored image URL
      document.getElementById('selected_image_url').value = '';
      document.getElementById('gallery_featured_image').value = '';
      document.getElementById('featured_image').value = '';
    }

    function removeBannerImage() {
      if (window.wpBuilderInstance) {
        window.wpBuilderInstance.bannerPreview = null;
      }
      document.getElementById('banner_image').value = '';
    }

    // Simple Image Modal Functions
    let selectedImage = null;
    let mediaImages = [];
    let currentMediaTab = 'upload';

    function openImageModal() {
      // Check if this is from content editor
      const isContentEditor = window.wpBuilderInstance && window.wpBuilderInstance.quillEditor;
      
      // Set a flag to track the source
      window.mediaModalSource = isContentEditor ? 'content-editor' : 'featured-image';
      
      document.getElementById('mediaLibraryModal').classList.remove('hidden');
      switchMediaTab('upload'); // Start with upload tab
      loadMediaGalleries(); // Load galleries for upload
    }

    function closeMediaLibraryModal() {
      document.getElementById('mediaLibraryModal').classList.add('hidden');
      selectedImage = null;
      // Remove selection highlights
      document.querySelectorAll('.media-image-item').forEach(item => {
        item.classList.remove('ring-2', 'ring-blue-500', 'ring-offset-2');
      });
      // Reset select button
      const selectBtn = document.getElementById('selectMediaBtn');
      selectBtn.disabled = true;
      selectBtn.textContent = 'Select Image';
    }

    function switchMediaTab(tabName) {
      currentMediaTab = tabName;
      
      // Update tab buttons
      document.getElementById('mediaUploadTab').className = tabName === 'upload' 
        ? 'py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400'
        : 'py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300';
      
      document.getElementById('mediaLibraryTab').className = tabName === 'library' 
        ? 'py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400'
        : 'py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300';

      // Show/hide tab content
      document.getElementById('mediaUploadTabContent').classList.toggle('hidden', tabName !== 'upload');
      document.getElementById('mediaLibraryTabContent').classList.toggle('hidden', tabName !== 'library');

      // Load media images if switching to library tab
      if (tabName === 'library') {
        loadMediaImages();
      }
    }

    // Load galleries for upload
    function loadMediaGalleries() {
      fetch('/cms/galleries')
        .then(response => response.json())
        .then(data => {
          const select = document.getElementById('mediaGallerySelect');
          if (!select) {
            console.error('Media gallery select element not found');
            return;
          }
          
          select.innerHTML = '<option value="">Choose a gallery...</option>';
          
          data.forEach(gallery => {
            const option = document.createElement('option');
            option.value = gallery.id;
            option.textContent = gallery.title;
            select.appendChild(option);
          });
        })
        .catch(error => {
          console.error('Error loading galleries:', error);
        });
    }

    function loadMediaImages() {
      const loading = document.getElementById('mediaLoading');
      const imagesContainer = document.getElementById('mediaGrid');
      const emptyState = document.getElementById('mediaEmpty');
      
      loading.classList.remove('hidden');
      imagesContainer.innerHTML = '';
      emptyState.classList.add('hidden');

      fetch('/cms/media/images')
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
      .then(data => {
          const images = data.data || data; // Handle both old and new response format
          mediaImages = images;
          if (images.length === 0) {
            emptyState.classList.remove('hidden');
          } else {
            displayMediaImages(images);
          }
          loading.classList.add('hidden');
      })
      .catch(error => {
          console.error('Error loading media library:', error);
          emptyState.innerHTML = `
            <div class="text-center py-8">
              <svg class="w-12 h-12 text-red-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
              </svg>
              <p class="text-red-600 mb-2">Error loading media library</p>
              <p class="text-sm text-slate-500">Please check your connection and try again</p>
            </div>
          `;
          emptyState.classList.remove('hidden');
          loading.classList.add('hidden');
        });
    }

    function displayMediaImages(images) {
      const container = document.getElementById('mediaGrid');
      container.innerHTML = '';

      if (images.length === 0) {
        document.getElementById('mediaEmpty').classList.remove('hidden');
        return;
      }

      images.forEach(image => {
        const imageUrl = image.thumb || image.url;
        
        const div = document.createElement('div');
        div.className = 'media-image-item relative group cursor-pointer rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200 border border-slate-200 dark:border-slate-700';
        div.onclick = () => selectImageFromMedia(image);
        
        div.innerHTML = `
          <div class="aspect-square relative bg-gray-100" style="overflow: hidden;">
            <img src="${imageUrl}" 
                 alt="${image.name}" 
                 class="w-full h-full object-cover rounded-lg" 
                 style="min-height: 200px; background-color: #f3f4f6; display: block !important; opacity: 1 !important; visibility: visible !important; position: relative; z-index: 1;"
                 onerror="this.style.backgroundColor='#ff0000'; this.style.border='2px solid red'; this.style.display='block';"
                 onload="this.style.backgroundColor='transparent'; this.style.display='block';">
            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-200 flex items-center justify-center rounded-lg">
              <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                <div class="bg-white rounded-full p-2">
                  <svg class="size-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <!-- Selection indicator -->
            <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
              <div class="bg-blue-600 rounded-full p-1">
                <svg class="size-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
            </div>
          </div>
          <div class="p-2">
            <p class="text-xs text-slate-600 dark:text-slate-400 truncate" title="${image.name}">${image.name}</p>
            <p class="text-xs text-slate-500 dark:text-slate-500">${image.gallery_title || 'Gallery'}</p>
          </div>
        `;
        
        container.appendChild(div);
      });
    }

    function selectImageFromMedia(image) {
      // Remove previous selection
      document.querySelectorAll('.media-image-item').forEach(item => {
        item.classList.remove('ring-2', 'ring-blue-500', 'ring-offset-2');
        // Remove checkmark
        const checkmark = item.querySelector('.absolute.top-2.right-2');
        if (checkmark) {
          checkmark.classList.add('opacity-0');
          checkmark.classList.remove('opacity-100');
        }
      });
      
      // Add selection to clicked item
      event.currentTarget.classList.add('ring-2', 'ring-blue-500', 'ring-offset-2');
      
      // Show checkmark for selected item
      const checkmark = event.currentTarget.querySelector('.absolute.top-2.right-2');
      if (checkmark) {
        checkmark.classList.remove('opacity-0');
        checkmark.classList.add('opacity-100');
      }
      
      selectedImage = image;
      
      // Enable select button
      const selectBtn = document.getElementById('selectMediaBtn');
      selectBtn.disabled = false;
      selectBtn.textContent = `Select Image (${image.name})`;
    }

    function selectMediaImage() {
      if (!selectedImage) {
        alert('Please select an image first');
        return;
      }

      // Check if this is for content editor or featured image
      const isContentEditor = window.mediaModalSource === 'content-editor';
      
      if (isContentEditor) {
        // Insert image into Quill editor
        const imageUrl = selectedImage.url; // Use full URL for content
        const quill = window.wpBuilderInstance.quillEditor;
        
        try {
          // Get current selection or set to end
          let range = quill.getSelection(true); // Force selection
          
          if (!range) {
            // If no selection, get the length and set to end
            const length = quill.getLength();
            range = { index: Math.max(0, length - 1), length: 0 };
          }
          
          // Ensure range.index is valid
          if (range.index < 0) {
            range.index = 0;
          }
          
          // Insert the image
          quill.insertEmbed(range.index, 'image', imageUrl);
          
          // Move cursor after the image
          setTimeout(() => {
            quill.setSelection(range.index + 1, 0);
            quill.focus();
          }, 10);
          
          console.log('Image inserted into content editor at position:', range.index, 'URL:', imageUrl);
        } catch (error) {
          console.error('Error inserting image into Quill editor:', error);
          // Fallback: insert at the end
          try {
            const length = quill.getLength();
            quill.insertEmbed(Math.max(0, length - 1), 'image', imageUrl);
            setTimeout(() => {
              quill.setSelection(length, 0);
              quill.focus();
            }, 10);
          } catch (fallbackError) {
            console.error('Fallback also failed:', fallbackError);
          }
        }
      } else {
        // Handle featured image selection
        const previewArea = document.getElementById('image-preview-area');
        const previewImg = document.getElementById('image-preview');
        const uploadArea = document.getElementById('image-upload-area');
        
        if (previewArea && previewImg && uploadArea) {
          console.log('Setting image preview:', selectedImage);
          
          // Use thumb URL if available, otherwise use main URL
          const imageUrl = selectedImage.thumb || selectedImage.url;
          
          // Validate the image URL
          if (!imageUrl || imageUrl === '' || imageUrl === window.location.href || imageUrl.includes('cms/blog/edit')) {
            console.error('Invalid image URL:', imageUrl);
            return;
          }
          
          // Set image source with forced display
          previewImg.src = imageUrl;
          previewImg.style.display = 'block';
          previewImg.style.width = '100%';
          previewImg.style.height = '192px';
          previewImg.style.objectFit = 'cover';
          previewImg.style.backgroundColor = 'transparent';
          previewImg.style.border = '1px solid #e2e8f0';
          previewImg.style.borderRadius = '0.5rem';
          
          previewArea.classList.remove('hidden');
          uploadArea.style.display = 'none';
          
          // Store the image URL
          document.getElementById('selected_image_url').value = imageUrl;
          document.getElementById('gallery_featured_image').value = selectedImage.url;
          
          console.log('Image preview set to:', imageUrl);
        }

        // Clear the file input
        document.getElementById('featured_image').value = '';
      }

      // Close modal and reset state
      closeMediaLibraryModal();
      selectedImage = null;
      document.getElementById('selectMediaBtn').setAttribute('disabled', 'true');
    }

    // Search functionality
    document.getElementById('mediaSearch').addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const filteredImages = mediaImages.filter(image => 
        image.name.toLowerCase().includes(searchTerm) || 
        image.gallery_title.toLowerCase().includes(searchTerm)
      );
      displayMediaImages(filteredImages);
    });

    // Media upload form submission
    document.getElementById('mediaUploadForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const progressBar = document.getElementById('mediaUploadProgress');
      const progressFill = progressBar.querySelector('.bg-primary');
      
      progressBar.classList.remove('hidden');
      
      fetch('/cms/media/upload', {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          showNotification('Files uploaded successfully!', 'success');
          
          // If only one image was uploaded, automatically select it
          if (data.images && data.images.length === 1) {
            const uploadedImage = data.images[0];
            selectedMediaImage = uploadedImage;
            
          // Set featured image preview
      if (window.wpBuilderInstance) {
              window.wpBuilderInstance.featuredPreview = uploadedImage.url;
            }
            
            // Show the image preview
            const previewDiv = document.getElementById('featured-image-preview');
            const previewImg = document.getElementById('featured-preview-img');
            const uploadBox = document.getElementById('featured-image-box');
            
            if (previewDiv && previewImg && uploadBox) {
              console.log('Setting featured image preview from upload:', uploadedImage);
              console.log('Uploaded image URL:', uploadedImage.url);
              console.log('Uploaded image thumb:', uploadedImage.thumb);
              
              // Use thumb URL if available, otherwise use main URL
              const imageUrl = uploadedImage.thumb || uploadedImage.url;
              
              // Validate the image URL
              if (!imageUrl || imageUrl === '' || imageUrl === window.location.href) {
                console.error('Invalid uploaded image URL:', imageUrl);
                return;
              }
              
              previewImg.src = imageUrl;
              previewDiv.classList.remove('hidden');
              uploadBox.style.display = 'none';
              console.log('Featured image preview set from upload to:', imageUrl);
            }
            
            // Set the gallery featured image field
            document.getElementById('gallery_featured_image').value = uploadedImage.url;

            // Clear file input
      document.getElementById('featured_image').value = '';

            // Close modal after a short delay
            setTimeout(() => {
              closeMediaLibraryModal();
            }, 1000);
          } else {
            // If multiple images, just close modal after a short delay
            setTimeout(() => {
              closeMediaLibraryModal();
            }, 2000);
          }
        } else {
          throw new Error(data.message || 'Upload failed');
        }
      })
      .catch(error => {
        console.error('Upload error:', error);
        showNotification('Upload failed: ' + error.message, 'error');
      })
      .finally(() => {
        progressBar.classList.add('hidden');
      });
    });

    function showNotification(message, type = 'info') {
      // Create notification element
      const notification = document.createElement('div');
      notification.className = `fixed top-4 right-4 z-50 px-4 py-2 rounded-md text-white ${
        type === 'success' ? 'bg-green-600' : type === 'error' ? 'bg-red-600' : 'bg-blue-600'
      }`;
      notification.textContent = message;
      
      document.body.appendChild(notification);
      
      // Remove after 3 seconds
      setTimeout(() => {
        notification.remove();
      }, 3000);
    }

    // Close modal when clicking outside
    document.getElementById('mediaLibraryModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeMediaLibraryModal();
      }
    });
  </script>

  <style>
    /* Force image display */
    #image-preview {
      display: block !important;
      width: 100% !important;
      height: 192px !important;
      object-fit: cover !important;
      background-color: transparent !important;
      border: 1px solid #e2e8f0 !important;
      border-radius: 0.5rem !important;
    }
    
    #image-preview-area {
      display: block !important;
    }
    
    #image-preview-area.hidden {
      display: none !important;
    }
    
    /* Quill Editor Styles */
    .ql-header-filled .ql-toolbar {
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
    }
    
    .dark .ql-header-filled .ql-toolbar {
      background: #1e293b;
      border-bottom: 1px solid #475569;
    }
    
    .ql-editor {
      min-height: 400px;
    }
    
    /* Image styling in editor */
    .ql-editor img {
      max-width: 100%;
      height: auto;
      border-radius: 0.5rem;
      margin: 1rem 0;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    
    /* Modal styles */
    .btn {
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      font-weight: 500;
      cursor: pointer;
      border: none;
      transition: all 0.2s;
    }
    
    .btn.bg-primary {
      background: #3b82f6;
      color: white;
    }
    
    .btn.bg-primary:hover {
      background: #2563eb;
    }
    
    .btn.bg-slate-150 {
      background: #f1f5f9;
      color: #334155;
    }
    
    .btn.bg-slate-150:hover {
      background: #e2e8f0;
    }
  </style>
</x-app-layout>