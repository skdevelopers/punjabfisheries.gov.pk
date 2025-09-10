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

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Featured Image</h3>
              <div class="space-y-3">
                @if($post->featured_image)
                  <div class="mb-2">
                    <img src="{{ Storage::url($post->featured_image) }}" alt="Current featured image" class="h-32 w-full object-cover rounded-md">
                    <p class="text-xs text-slate-500 mt-1">Current featured image</p>
                  </div>
                @endif
                <input type="file" id="featured_image" name="featured_image" accept="image/*"
                       class="block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-600 file:px-3 file:py-2 file:text-white hover:file:bg-blue-700">
                <div x-show="featuredPreview" class="overflow-hidden rounded-md border border-slate-200 dark:border-slate-700">
                  <img :src="featuredPreview" alt="Preview" class="h-32 w-full object-cover">
                </div>
              </div>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
              <h3 class="mb-4 text-lg font-medium text-slate-800 dark:text-slate-100">Banner Image</h3>
              <div class="space-y-3">
                @if($post->banner_image)
                  <div class="mb-2">
                    <img src="{{ Storage::url($post->banner_image) }}" alt="Current banner image" class="h-32 w-full object-cover rounded-md">
                    <p class="text-xs text-slate-500 mt-1">Current banner image</p>
                  </div>
                @endif
                <input type="file" id="banner_image" name="banner_image" accept="image/*"
                       class="block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-600 file:px-3 file:py-2 file:text-white hover:file:bg-blue-700">
                <div x-show="bannerPreview" class="overflow-hidden rounded-md border border-slate-200 dark:border-slate-700">
                  <img :src="bannerPreview" alt="Banner Preview" class="h-32 w-full object-cover">
                </div>
              </div>
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