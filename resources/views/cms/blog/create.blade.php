<x-app-layout title="Create Blog Post" is-header-blur="true">
  <!-- Main Content Wrapper -->
  <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="wpBuilder()" x-init="init()">
    <div class="mt-4 sm:mt-5 lg:mt-6">
      <!-- Header -->
      <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100">Create Blog Post</h1>
          <p class="text-slate-500 dark:text-slate-300">Create a new blog post with rich content</p>
        </div>
        <a href="{{ route('cms.blog.index') }}"
           class="mt-3 inline-flex items-center rounded-md border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
          ← Back to Posts
        </a>
      </div>

      <form action="{{ route('cms.blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm" @submit="syncBeforeSubmit">
        @csrf

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">
          <!-- MAIN -->
          <div class="space-y-6 lg:col-span-3">
            <!-- Title -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Post Title <span class="text-red-500">*</span></label>
              <input id="title" name="title" value="{{ old('title') }}" required
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
              <textarea id="content" name="content" class="hidden">{{ old('content') }}</textarea>
              @error('content') <p class="px-4 pb-4 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Excerpt -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <label class="mb-2 block text-sm font-medium text-slate-700 dark:text-slate-200">Excerpt</label>
              <textarea id="excerpt" name="excerpt" rows="3"
                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 outline-none ring-0 placeholder:text-slate-400 focus:border-blue-600 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100"
                        placeholder="Brief description of the post">{{ old('excerpt') }}</textarea>
              @error('excerpt') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- SEO Settings -->
            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">SEO Settings</h3>
              <div class="space-y-4">
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Title</label>
                  <input id="meta_title" name="meta_title" value="{{ old('meta_title') }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Description</label>
                  <textarea id="meta_description" name="meta_description" rows="3"
                            class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">{{ old('meta_description') }}</textarea>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Meta Keywords</label>
                  <input id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
              </div>
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
                    <option value="draft" {{ old('status')=='draft'?'selected':'' }}>Draft</option>
                    <option value="published" {{ old('status')=='published'?'selected':'' }}>Published</option>
                    <option value="archived" {{ old('status')=='archived'?'selected':'' }}>Archived</option>
                  </select>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Publish Date</label>
                  <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at') }}"
                         class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                </div>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured')?'checked':'' }}
                         class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600">
                  <span class="text-sm">Featured Post</span>
                </label>
                <label class="inline-flex items-center gap-2">
                  <input type="checkbox" id="allow_comments" name="allow_comments" value="1" {{ old('allow_comments', true)?'checked':'' }}
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
                      <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="mb-1 block text-sm font-medium">Tags</label>
                  <select id="tags" name="tags[]" multiple size="6"
                          class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', []))?'selected':'' }}>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                  <p class="mt-1 text-xs text-slate-500">Hold Ctrl/Cmd to select multiple tags</p>
                </div>
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Featured Image</h3>
              <div class="space-y-3">
                <!-- WordPress-style Featured Image Box -->
                <div id="featured-image-box" class="border-2 border-dashed border-slate-300 rounded-lg p-6 text-center hover:border-slate-400 transition-colors cursor-pointer" 
                     onclick="openGalleryModal()" 
                     x-data="{ hasImage: false }" 
                     x-show="!featuredPreview">
                  <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                  <p class="text-slate-600 mb-2">Set featured image</p>
                  <p class="text-sm text-slate-500">Click to upload an image or choose from gallery</p>
                </div>
                
                <!-- Image Preview -->
                <div x-show="featuredPreview" class="relative group">
                  <img :src="featuredPreview" alt="Featured Image Preview" class="w-full h-48 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                  <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 rounded-lg flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex gap-2">
                      <button type="button" onclick="document.getElementById('featured_image').click()" 
                              class="bg-white text-slate-800 px-3 py-2 rounded-md text-sm font-medium hover:bg-slate-100">
                        Change Image
                      </button>
                      <button type="button" onclick="openGalleryModal()" 
                              class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                        Choose from Gallery
                      </button>
                      <button type="button" onclick="removeFeaturedImage()" 
                              class="bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                        Remove
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Hidden File Input -->
                <input type="file" id="featured_image" name="featured_image" accept="image/*" class="hidden">
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Banner Image</h3>
              <div class="space-y-3">
                <!-- WordPress-style Banner Image Box -->
                <div id="banner-image-box" class="border-2 border-dashed border-slate-300 rounded-lg p-6 text-center hover:border-slate-400 transition-colors cursor-pointer" 
                     onclick="openBannerGalleryModal()" 
                     x-show="!bannerPreview">
                  <svg class="w-12 h-12 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  <p class="text-slate-600 mb-2">Set banner image</p>
                  <p class="text-sm text-slate-500">Click to upload a banner image</p>
                </div>

                <!-- Banner Image Preview -->
                <div x-show="bannerPreview" class="relative group">
                  <img :src="bannerPreview" alt="Banner Image Preview" class="w-full h-32 object-cover rounded-lg border border-slate-200 dark:border-slate-700">
                  <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 rounded-lg flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex gap-2">
                      <button type="button" onclick="document.getElementById('banner_image').click()" 
                              class="bg-white text-slate-800 px-3 py-2 rounded-md text-sm font-medium hover:bg-slate-100">
                        Change Image
                      </button>
                      <button type="button" onclick="removeBannerImage()" 
                              class="bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700">
                        Remove
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Hidden File Input -->
                <input type="file" id="banner_image" name="banner_image" accept="image/*" class="hidden">
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <div class="space-y-3">
                <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-md bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                  Create Post
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

  <!-- WordPress-style Media Gallery Modal -->
  <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white dark:bg-slate-800 rounded-lg max-w-6xl max-h-[90vh] w-full overflow-hidden shadow-2xl">
      <!-- Modal Header -->
      <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-slate-700">
        <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100">Featured Image</h3>
        <button onclick="closeGalleryModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 p-1">
          <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Tabs -->
      <div class="border-b border-slate-200 dark:border-slate-700">
        <nav class="flex space-x-8 px-4" aria-label="Tabs">
          <button onclick="switchTab('upload')" id="uploadTab" 
                  class="py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400">
            Upload files
          </button>
          <button onclick="switchTab('library')" id="libraryTab" 
                  class="py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300">
            Media Library
          </button>
        </nav>
      </div>

      <!-- Tab Content -->
      <div class="flex-1 overflow-hidden">
        <!-- Upload Tab -->
        <div id="uploadTabContent" class="h-full flex flex-col">
          <div class="flex-1 flex items-center justify-center p-8">
            <div class="text-center">
              <div class="border-2 border-dashed border-slate-300 dark:border-slate-600 rounded-lg p-12 hover:border-slate-400 dark:hover:border-slate-500 transition-colors cursor-pointer" 
                   onclick="document.getElementById('galleryFileUpload').click()">
                <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="mt-4">
                  <p class="text-lg font-medium text-slate-900 dark:text-slate-100">Drop files to upload</p>
                  <p class="text-slate-500 dark:text-slate-400">or</p>
                  <button type="button" onclick="selectGalleryFiles()" 
                          class="mt-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Select Files
                  </button>
                </div>
              </div>
              <p class="mt-4 text-sm text-slate-500 dark:text-slate-400">Maximum upload file size: 2 MB</p>
              
              <!-- Gallery Selection -->
              <div class="mt-4">
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Select Gallery</label>
                <select id="gallerySelect" class="w-full px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-700 dark:text-slate-100">
                  <option value="">Choose a gallery...</option>
                </select>
              </div>
              
              <input type="file" id="galleryFileUpload" multiple accept="image/*" class="hidden" onchange="handleGalleryFileSelect(event)">
            </div>
          </div>
        </div>

        <!-- Media Library Tab -->
        <div id="libraryTabContent" class="h-full flex flex-col hidden">
          <div class="p-4 border-b border-slate-200 dark:border-slate-700">
            <!-- Filter and Search -->
            <div class="flex gap-4 items-center">
              <div class="flex items-center gap-2">
                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Filter media:</label>
                <select id="galleryFilter" class="text-sm border border-slate-300 dark:border-slate-600 rounded-md px-3 py-1 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100">
                  <option value="">All media items</option>
                  <option value="images">Images</option>
                  <option value="recent">Recent</option>
                </select>
              </div>
              <div class="flex-1">
                <input type="text" id="gallerySearch" placeholder="Search media..." 
                       class="w-full text-sm border border-slate-300 dark:border-slate-600 rounded-md px-3 py-1 bg-white dark:bg-slate-700 text-slate-900 dark:text-slate-100">
              </div>
            </div>
        </div>
        
        <!-- Images Grid -->
          <div class="flex-1 overflow-y-auto p-4">
            <div id="galleryImages" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
          <!-- Images will be loaded here -->
        </div>
        
        <!-- Loading State -->
            <div id="galleryLoading" class="text-center py-8 hidden">
              <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
              <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Loading images...</p>
            </div>

            <!-- Empty State -->
            <div id="galleryEmpty" class="text-center py-12 hidden">
              <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
              <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">No images found</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end gap-3 p-4 border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-700">
        <button onclick="closeGalleryModal()" 
                class="px-4 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-600 border border-slate-300 dark:border-slate-500 rounded-md hover:bg-slate-50 dark:hover:bg-slate-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Cancel
        </button>
        <button onclick="selectGalleryImage()" id="selectImageBtn" disabled
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
          Set featured image
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
          // previews
          const f = document.getElementById('featured_image');
          if (f) f.addEventListener('change', e => this.readPreview(e,'featuredPreview'));
          const b = document.getElementById('banner_image');
          if (b) b.addEventListener('change', e => this.readPreview(e,'bannerPreview'));
          
          // Make instance globally available for modal
          window.wpBuilderInstance = this;
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

          // Load old content if exists
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
          this.openImageModal();
        },

        openImageModal() {
          // Create modal for image selection
          const modal = document.createElement('div');
          modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
          modal.innerHTML = `
            <div class="bg-white rounded-lg p-6 max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-800">Insert Image</h3>
                <button onclick="this.closest('.fixed').remove()" class="text-slate-400 hover:text-slate-600">
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
                <button onclick="this.closest('.fixed').remove()" class="btn bg-slate-150 text-slate-800 hover:bg-slate-200">
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
          document.querySelector('.fixed.inset-0').remove();
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
    function removeFeaturedImage() {
      if (window.wpBuilderInstance) {
        window.wpBuilderInstance.featuredPreview = null;
      }
      document.getElementById('featured_image').value = '';
    }

    function removeBannerImage() {
      if (window.wpBuilderInstance) {
        window.wpBuilderInstance.bannerPreview = null;
      }
      document.getElementById('banner_image').value = '';
    }

    // WordPress-style Gallery Modal Functions
    let selectedGalleryImage = null;
    let galleryImages = [];
    let currentTab = 'upload';

    function openGalleryModal() {
      document.getElementById('galleryModal').classList.remove('hidden');
      switchTab('upload'); // Start with upload tab
      loadGalleries(); // Load galleries for upload
    }

    function openBannerGalleryModal() {
      // For now, use the same modal but we can customize it later
      document.getElementById('galleryModal').classList.remove('hidden');
      switchTab('upload'); // Start with upload tab
    }

    function closeGalleryModal() {
      document.getElementById('galleryModal').classList.add('hidden');
      selectedGalleryImage = null;
      // Remove selection highlights
      document.querySelectorAll('.gallery-image-item').forEach(item => {
        item.classList.remove('ring-2', 'ring-blue-500', 'ring-offset-2');
      });
      // Reset select button and modal title
      const selectBtn = document.getElementById('selectImageBtn');
      selectBtn.disabled = true;
      selectBtn.textContent = 'Set featured image';
      document.querySelector('#galleryModal h3').textContent = 'Featured Image';
    }

    function switchTab(tabName) {
      currentTab = tabName;
      
      // Update tab buttons
      document.getElementById('uploadTab').className = tabName === 'upload' 
        ? 'py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400'
        : 'py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300';
      
      document.getElementById('libraryTab').className = tabName === 'library' 
        ? 'py-3 px-1 border-b-2 border-blue-500 font-medium text-sm text-blue-600 dark:text-blue-400'
        : 'py-3 px-1 border-b-2 border-transparent font-medium text-sm text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300';

      // Show/hide tab content
      document.getElementById('uploadTabContent').classList.toggle('hidden', tabName !== 'upload');
      document.getElementById('libraryTabContent').classList.toggle('hidden', tabName !== 'library');

      // Load gallery images if switching to library tab
      if (tabName === 'library') {
        loadGalleryImages();
      }
    }

    // Load galleries for upload
    function loadGalleries() {
      fetch('/cms/galleries')
        .then(response => response.json())
        .then(data => {
          const select = document.getElementById('gallerySelect');
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

    function loadGalleryImages() {
      const loading = document.getElementById('galleryLoading');
      const imagesContainer = document.getElementById('galleryImages');
      const emptyState = document.getElementById('galleryEmpty');
      
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
          galleryImages = images;
          if (images.length === 0) {
            emptyState.classList.remove('hidden');
          } else {
            displayGalleryImages(images);
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

    // Select gallery files
    function selectGalleryFiles() {
      const galleryId = document.getElementById('gallerySelect').value;
      if (!galleryId) {
        alert('Please select a gallery first');
        return;
      }
      document.getElementById('galleryFileUpload').click();
    }

    // Handle file selection
    function handleGalleryFileSelect(event) {
      const files = event.target.files;
      if (files && files.length > 0) {
        handleGalleryUpload(files);
      }
      // Reset the input value to allow selecting the same file again
      event.target.value = '';
    }

    // Handle file upload in gallery
    function handleGalleryUpload(files) {
      if (!files || files.length === 0) return;

      const formData = new FormData();
      Array.from(files).forEach(file => {
        formData.append('files[]', file);
      });

      // Show loading state
      const uploadArea = document.querySelector('#uploadTabContent .text-center');
      const originalContent = uploadArea.innerHTML;
      uploadArea.innerHTML = `
        <div class="text-center">
          <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-400">Uploading images...</p>
        </div>
      `;

      // Get selected gallery
      const galleryId = document.getElementById('gallerySelect').value;
      if (!galleryId) {
        alert('Please select a gallery first');
        return;
      }

      // Add gallery_id to form data
      formData.append('gallery_id', galleryId);
      formData.append('collection_name', 'images');

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
          // Switch to library tab and refresh
          switchTab('library');
          loadGalleryImages();
          // Show success message
          showNotification('Images uploaded successfully!', 'success');
          
          // If only one image was uploaded, automatically select it
          if (files.length === 1) {
            // Wait a moment for the gallery to load, then select the first image
            setTimeout(() => {
              const firstImage = document.querySelector('.gallery-image-item');
              if (firstImage) {
                firstImage.click();
                // Auto-select the image and close modal
                setTimeout(() => {
                  selectGalleryImage();
                }, 100);
              }
            }, 1000);
          } else {
            // If multiple images, just close modal after a short delay
            setTimeout(() => {
              closeGalleryModal();
            }, 2000);
          }
        } else {
          throw new Error(data.message || 'Upload failed');
        }
      })
      .catch(error => {
        console.error('Upload error:', error);
        showNotification('Upload failed: ' + error.message, 'error');
        uploadArea.innerHTML = originalContent;
        // Reset gallery selection
        document.getElementById('gallerySelect').value = '';
      });
    }

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

    function displayGalleryImages(images) {
      const container = document.getElementById('galleryImages');
      container.innerHTML = '';

      if (images.length === 0) {
        document.getElementById('galleryEmpty').classList.remove('hidden');
        return;
      }

      images.forEach(image => {
        const div = document.createElement('div');
        div.className = 'gallery-image-item relative group cursor-pointer rounded-lg overflow-hidden hover:shadow-lg transition-all duration-200 border border-slate-200 dark:border-slate-700';
        div.onclick = () => selectImageFromGallery(image);
        
        div.innerHTML = `
          <div class="aspect-square relative bg-gray-100">
            <img src="${image.thumb || image.url}" 
                 alt="${image.name}" 
                 class="w-full h-full object-cover rounded-lg" 
                 style="min-height: 200px; background-color: #f3f4f6;"
                 onerror="console.log('Image failed to load:', this.src); this.style.display='none'; this.nextElementSibling.style.display='flex';"
                 onload="console.log('Image loaded successfully:', this.src); this.style.display='block'; this.nextElementSibling.style.display='none';">
            <div class="absolute inset-0 bg-gray-200 flex items-center justify-center rounded-lg" style="display: none;">
              <div class="text-center text-gray-500">
                <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-xs">Loading...</p>
              </div>
            </div>
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

    function selectImageFromGallery(image) {
      // Remove previous selection
      document.querySelectorAll('.gallery-image-item').forEach(item => {
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
      
      selectedGalleryImage = image;
      
      // Enable select button
      const selectBtn = document.getElementById('selectImageBtn');
      selectBtn.disabled = false;
      selectBtn.textContent = `Set featured image (${image.name})`;
    }

    function selectGalleryImage() {
      if (!selectedGalleryImage) {
        alert('Please select an image first');
        return;
      }

      // Set the featured image preview
      if (window.wpBuilderInstance) {
        window.wpBuilderInstance.featuredPreview = selectedGalleryImage.url;
      }

      // Create a hidden input to store the gallery image URL
      let hiddenInput = document.getElementById('gallery_featured_image');
      if (!hiddenInput) {
        hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'gallery_featured_image';
        hiddenInput.id = 'gallery_featured_image';
        document.getElementById('blogForm').appendChild(hiddenInput);
      }
      hiddenInput.value = selectedGalleryImage.url;

      // Clear the file input
      document.getElementById('featured_image').value = '';

      closeGalleryModal();
    }

    // Search functionality
    document.getElementById('gallerySearch').addEventListener('input', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const filteredImages = galleryImages.filter(image => 
        image.name.toLowerCase().includes(searchTerm) || 
        image.gallery_title.toLowerCase().includes(searchTerm)
      );
      displayGalleryImages(filteredImages);
    });

    // File upload event listener
    document.getElementById('galleryFileUpload').addEventListener('change', function(e) {
      // If only one file is selected, show preview immediately
      if (e.target.files.length === 1) {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
          // Set featured image preview
          if (window.wpBuilderInstance) {
            window.wpBuilderInstance.featuredPreview = e.target.result;
          }
        };
        reader.readAsDataURL(file);
      }
      
      handleGalleryUpload(e.target.files);
    });

    // Drag and drop functionality
    const uploadArea = document.querySelector('#uploadTabContent .border-dashed');
    if (uploadArea) {
      uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-blue-400', 'bg-blue-50');
      });

      uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50');
      });

      uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-blue-400', 'bg-blue-50');
        handleGalleryUpload(e.dataTransfer.files);
      });
    }

    // Close modal when clicking outside
    document.getElementById('galleryModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeGalleryModal();
      }
    });
  </script>

  <style>
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