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
              <!-- Toolbar -->
              <div class="flex flex-wrap items-center gap-2 border-b border-slate-200 bg-slate-50 p-3 dark:border-slate-700 dark:bg-slate-900">
                <!-- Block controls -->
                <div class="flex items-center gap-2">
                  <select x-ref="headingSelect" @change="applyBlock($event.target.value)"
                          class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-sm dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">
                    <option value="p">Paragraph</option>
                    <option value="h1">Heading 1</option>
                    <option value="h2" selected>Heading 2</option>
                    <option value="h3">Heading 3</option>
                    <option value="h4">Heading 4</option>
                    <option value="h5">Heading 5</option>
                    <option value="h6">Heading 6</option>
                  </select>
                  <button type="button" @click="applyBlock('h2')" class="px-2.5 py-1.5 text-sm rounded-md border border-slate-300 bg-white hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">H2</button>
                  <button type="button" @click="$refs.imageModal.showModal()" class="px-2.5 py-1.5 text-sm rounded-md border border-slate-300 bg-white hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">Image</button>
                  <button type="button" @click="$refs.videoModal.showModal()" class="px-2.5 py-1.5 text-sm rounded-md border border-slate-300 bg-white hover:bg-slate-50 dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">Video</button>
                </div>

                <div class="h-5 w-px bg-slate-300/70 dark:bg-slate-600"></div>

                <!-- Inline -->
                <div class="flex items-center gap-2">
                  <button type="button" @click="applyInline('bold')"      :class="btnActive('bold')" class="btn">B</button>
                  <button type="button" @click="applyInline('italic')"    :class="btnActive('italic')" class="btn"><em>I</em></button>
                  <button type="button" @click="applyInline('underline')" :class="btnActive('underline')" class="btn"><span class="underline">U</span></button>
                  <button type="button" @click="applyInline('strikeThrough')" :class="btnActive('strikeThrough')" class="btn">S</button>
                </div>

                <div class="h-5 w-px bg-slate-300/70 dark:bg-slate-600"></div>

                <!-- Lists -->
                <div class="flex items-center gap-2">
                  <button type="button" @click="applyInline('insertUnorderedList')" class="btn">• List</button>
                  <button type="button" @click="applyInline('insertOrderedList')"   class="btn">1. List</button>
                  <button type="button" @click="applyInline('insertHorizontalRule')" class="btn">—</button>
                </div>

                <div class="h-5 w-px bg-slate-300/70 dark:bg-slate-600"></div>

                <!-- Align -->
                <div class="flex items-center gap-2">
                  <button type="button" @click="applyInline('justifyLeft')"   class="btn">⟸</button>
                  <button type="button" @click="applyInline('justifyCenter')" class="btn">≡</button>
                  <button type="button" @click="applyInline('justifyRight')"  class="btn">⟹</button>
                  <button type="button" @click="applyInline('justifyFull')"   class="btn">⟷</button>
                </div>

                <div class="h-5 w-px bg-slate-300/70 dark:bg-slate-600"></div>

                <!-- Links -->
                <div class="flex items-center gap-2">
                  <button type="button" @click="$refs.linkModal.showModal()" class="btn">🔗</button>
                  <button type="button" @click="unlink()" class="btn">⛓✕</button>
                </div>

                <div class="h-5 w-px bg-slate-300/70 dark:bg-slate-600"></div>

                <!-- Media align -->
                <div class="flex items-center gap-2">
                  <button type="button" @click="alignSelected('left')"   class="btn">Img ⟸</button>
                  <button type="button" @click="alignSelected('center')" class="btn">↔ Img</button>
                  <button type="button" @click="alignSelected('right')"  class="btn">Img ⟹</button>
                  <button type="button" @click="alignSelected('full')"   class="btn">⇔ Img</button>
                </div>

                <div class="ml-auto flex items-center gap-3 text-xs text-slate-500 dark:text-slate-300">
                  <span>Current block: <span class="font-medium" x-text="currentBlock"></span></span>
                  <span>Word count: <span class="font-medium" x-text="wordCount"></span></span>
                  <button type="button" @click="insertTestVideo" class="rounded-full border border-slate-300 px-2 py-0.5 hover:bg-slate-50 dark:border-slate-600 dark:hover:bg-slate-700">Test Video</button>
                  <button type="button" @click="moveFirstImageTop" class="rounded-full border border-slate-300 px-2 py-0.5 hover:bg-slate-50 dark:border-slate-600 dark:hover:bg-slate-700">Move First Image ↑</button>
                </div>
              </div>

              <!-- Editor -->
              <div id="editor" x-ref="editor" contenteditable="true"
                   class="prose prose-slate max-w-none min-h-[420px] p-4 focus:outline-none dark:prose-invert overflow-hidden"
                   @input="syncHTML(); updateState()"
                   @keyup="updateState()"
                   @mouseup="updateState()">
                {!! old('content') !!}
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

    <!-- Link Modal -->
    <dialog x-ref="linkModal" class="w-full max-w-md rounded-lg p-0 backdrop:bg-black/40">
      <div class="rounded-lg bg-white p-6 dark:bg-slate-800">
        <h3 class="mb-4 text-lg font-medium">Insert Link</h3>
        <div class="space-y-3">
          <input type="url" x-model="link.url" placeholder="https://example.com"
                 class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
          <input type="text" x-model="link.text" placeholder="Optional link text"
                 class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
        </div>
        <div class="mt-5 flex gap-2">
          <button type="button" @click="insertLink" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700">Insert</button>
          <button type="button" @click="$refs.linkModal.close()" class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">Cancel</button>
        </div>
      </div>
    </dialog>

    <!-- Image Modal -->
    <dialog x-ref="imageModal" class="w-full max-w-md rounded-lg p-0 backdrop:bg-black/40">
      <div class="rounded-lg bg-white p-6 dark:bg-slate-800">
        <h3 class="mb-4 text-lg font-medium">Upload Image</h3>
        <div class="space-y-3">
          <input type="text" x-model="image.alt" placeholder="Alt text"
                 class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
          <input type="file" x-ref="imageFile" accept="image/*"
                 class="block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-600 file:px-3 file:py-2 file:text-white hover:file:bg-blue-700">
        </div>
        <div class="mt-5 flex gap-2">
          <button type="button" @click="insertImage" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700">Insert</button>
          <button type="button" @click="$refs.imageModal.close(); resetImageModal()" class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">Cancel</button>
        </div>
      </div>
    </dialog>

    <!-- Video Modal -->
    <dialog x-ref="videoModal" class="w-full max-w-md rounded-lg p-0 backdrop:bg-black/40">
      <div class="rounded-lg bg-white p-6 dark:bg-slate-800">
        <h3 class="mb-4 text-lg font-medium">Insert Video</h3>
        <div class="space-y-3">
          <input type="url" x-model="video.url" placeholder="YouTube/Vimeo URL"
                 class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
          <div class="grid grid-cols-2 gap-3">
            <input type="number" x-model.number="video.width"  min="100" max="1200"
                   class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100" placeholder="Width">
            <input type="number" x-model.number="video.height" min="100" max="800"
                   class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100" placeholder="Height">
          </div>
        </div>
        <div class="mt-5 flex gap-2">
          <button type="button" @click="insertVideo" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700">Insert</button>
          <button type="button" @click="$refs.videoModal.close(); resetVideoModal()" class="rounded-md border border-slate-200 bg-white px-3 py-2 text-sm hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">Cancel</button>
        </div>
      </div>
    </dialog>
  </main>

  <script>
    function wpBuilder(){
      return {
        // state
        wordCount: 0,
        currentBlock: 'Paragraph',
        featuredPreview: null,
        bannerPreview: null,
        link: { url: '', text: '' },
        image: { alt: '' },
        video: { url: '', width: 560, height: 315 },

        init(){
          // load old content
          const ta = document.getElementById('content');
          if (ta.value) this.$refs.editor.innerHTML = ta.value;

          // previews
          const f = document.getElementById('featured_image');
          if (f) f.addEventListener('change', e => this.readPreview(e,'featuredPreview'));
          const b = document.getElementById('banner_image');
          if (b) b.addEventListener('change', e => this.readPreview(e,'bannerPreview'));

          // initial state
          this.updateState();

          // click select for media
          this.attachMediaHandlers();

          // keep selection inside editor
          this.$refs.editor.addEventListener('click', ()=> this.saveSelection());
          this.$refs.editor.addEventListener('keyup',  ()=> this.saveSelection());
        },

        // === Utilities ===
        saveSelection(){
          const sel = window.getSelection();
          if (!sel || sel.rangeCount===0) { this._savedRange = null; return; }
          this._savedRange = sel.getRangeAt(0);
        },
        restoreSelection(){
          if (!this._savedRange) return false;
          const sel = window.getSelection();
          sel.removeAllRanges(); sel.addRange(this._savedRange);
          return true;
        },
        syncHTML(){
          document.getElementById('content').value = this.$refs.editor.innerHTML;
        },
        syncBeforeSubmit(){ this.syncHTML(); },

        // === State ===
        updateState(){
          // word count
          const t = (this.$refs.editor.innerText || '').trim();
          this.wordCount = t ? t.split(/\s+/).length : 0;

          // current block
          const sel = window.getSelection();
          if (sel && sel.rangeCount){
            let el = sel.getRangeAt(0).commonAncestorContainer;
            el = el.nodeType===1?el:el.parentElement;
            while (el && el !== this.$refs.editor){
              if (/^H[1-6]$/.test(el.tagName)) { this.currentBlock = el.tagName; this.$refs.headingSelect.value = el.tagName.toLowerCase(); break; }
              if (el.tagName==='P') { this.currentBlock = 'Paragraph'; this.$refs.headingSelect.value='p'; break; }
              el = el.parentElement;
            }
          }
        },

        // === Block & inline formatting ===
        applyBlock(tag){
          if (tag==='p') document.execCommand('formatBlock', false, 'p');
          else document.execCommand('formatBlock', false, tag);
          this.updateState(); this.syncHTML();
        },
        applyInline(cmd){
          document.execCommand(cmd, false, null);
          this.updateState(); this.syncHTML();
        },
        btnActive(cmd){ try { return document.queryCommandState(cmd) ? 'bg-blue-600 text-white border border-blue-600 hover:bg-blue-700' : 'btn' } catch { return 'btn' } },

        // === Links ===
        insertLink(){
          if (!this.link.url){ this.$refs.linkModal.close(); return; }
          // ensure a selection
          const sel = window.getSelection();
          if (!sel || sel.rangeCount===0 || sel.isCollapsed){
            // if no selected text, insert link text or URL
            const text = this.link.text || this.link.url;
            document.execCommand('insertHTML', false, `<a href="${this.link.url}" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline">${this.escape(text)}</a>`);
          } else {
            document.execCommand('createLink', false, this.link.url);
            // optional replace selected text label
            if (this.link.text){
              const r = sel.getRangeAt(0);
              r.deleteContents(); r.insertNode(document.createTextNode(this.link.text));
            }
          }
          this.link = { url:'', text:'' };
          this.$refs.linkModal.close();
          this.syncHTML();
        },
        unlink(){ document.execCommand('unlink', false, null); this.syncHTML(); },

        // === Image ===
        insertImage(){
          const input = this.$refs.imageFile;
          if (!input.files || !input.files[0]) return;
          const file = input.files[0];
          const reader = new FileReader();
          reader.onload = e=>{
            const html = this.wpImageHTML(e.target.result, this.image.alt||file.name);
            this.insertAtSelection(html);
            this.attachMediaHandlers();
            this.resetImageModal(); this.$refs.imageModal.close(); this.syncHTML();
          };
          reader.readAsDataURL(file);
        },
        wpImageHTML(src, alt){
          return `
            <div class="media-container my-4 w-full">
              <div class="relative inline-block max-w-full group">
                <img src="${src}" alt="${this.escape(alt)}" class="h-auto max-w-full rounded-lg border border-slate-200 dark:border-slate-600">
                <div class="absolute -right-2.5 -top-2.5 z-10 hidden gap-1 rounded-md border border-slate-200 bg-white p-1 shadow group-hover:flex dark:border-slate-600 dark:bg-slate-800">
                  <button data-align="left"   class="px-1.5 py-1 text-xs rounded hover:bg-slate-100 dark:hover:bg-slate-700" title="Align Left">⬅️</button>
                  <button data-align="center" class="px-1.5 py-1 text-xs rounded hover:bg-slate-100 dark:hover:bg-slate-700" title="Align Center">↔️</button>
                  <button data-align="right"  class="px-1.5 py-1 text-xs rounded hover:bg-slate-100 dark:hover:bg-slate-700" title="Align Right">➡️</button>
                  <button data-align="full"   class="px-1.5 py-1 text-xs rounded hover:bg-slate-100 dark:hover:bg-slate-700" title="Full Width">⇔</button>
                  <button data-remove="1"     class="px-1.5 py-1 text-xs rounded hover:bg-slate-100 dark:hover:bg-slate-700" title="Remove">✕</button>
                </div>
              </div>
            </div>`;
        },

        // === Video ===
        insertVideo(){
          if (!this.video.url) return;
          let u = this.video.url.trim(), id='';
          if (u.includes('youtube.com/watch')) { const qs = new URLSearchParams(u.split('?')[1]); id = qs.get('v'); if (id) u = `https://www.youtube.com/embed/${id}`; }
          else if (u.includes('youtu.be/')) { id = u.split('youtu.be/')[1].split('?')[0]; u=`https://www.youtube.com/embed/${id}`; }
          else if (u.includes('vimeo.com/')) { id = u.split('vimeo.com/')[1].split('?')[0]; u=`https://player.vimeo.com/video/${id}`; }
          else { alert('Valid YouTube/Vimeo URL required'); return; }
          const html = `
            <div class="media-container my-4 w-full">
              <div class="relative text-center">
                <iframe src="${u}" width="${this.video.width}" height="${this.video.height}" frameborder="0" allowfullscreen
                  class="mx-auto block max-w-full rounded-lg border border-slate-200 dark:border-slate-600"></iframe>
              </div>
            </div>`;
          this.insertAtSelection(html);
          this.resetVideoModal(); this.$refs.videoModal.close(); this.syncHTML();
        },

        // === Media alignment ===
        alignSelected(where){
          const el = this.findSelectedMedia();
          if (!el){ alert('Select an image/video first'); return; }
          // reset
          el.style.float=''; el.style.margin=''; el.style.display=''; el.style.width='';
          if (where==='left'){ el.style.float='left'; el.style.margin='1rem 1rem 1rem 0'; el.style.display='block'; }
          if (where==='center'){ el.style.display='block'; el.style.margin='1rem auto'; }
          if (where==='right'){ el.style.float='right'; el.style.margin='1rem 0 1rem 1rem'; el.style.display='block'; }
          if (where==='full'){ el.style.display='block'; el.style.width='100%'; el.style.margin='1rem 0'; }
          this.syncHTML();
        },
        attachMediaHandlers(){
          // click highlight + hover toolbar actions
          this.$refs.editor.querySelectorAll('img, iframe').forEach(el=>{
            el.onclick = (e)=>{ e.stopPropagation(); this.highlight(el); this.saveSelection(); };
          });
          this.$refs.editor.querySelectorAll('[data-align],[data-remove]').forEach(btn=>{
            btn.onclick = (e)=> {
              e.preventDefault(); e.stopPropagation();
              const container = e.target.closest('.media-container');
              const wrapper = container.querySelector('.relative');
              const media = wrapper.querySelector('img,iframe');
              if (btn.dataset.remove) { container.remove(); this.syncHTML(); return; }
              const where = btn.dataset.align;
              
              // Reset styles
              media.style.float=''; media.style.margin=''; media.style.display=''; media.style.width='';
              wrapper.className = "relative inline-block max-w-full group";
              
              // Apply alignment
              if (where==='left'){ 
                wrapper.className = "relative inline-block max-w-full group float-left mr-4 mb-4"; 
                media.style.display='block';
              }
              if (where==='center'){ 
                wrapper.className = "relative inline-block max-w-full group block mx-auto text-center"; 
                media.style.display='block';
              }
              if (where==='right'){ 
                wrapper.className = "relative inline-block max-w-full group float-right ml-4 mb-4"; 
                media.style.display='block';
              }
              if (where==='full'){ 
                wrapper.className = "relative inline-block max-w-full group block w-full text-center"; 
                media.style.display='block'; media.style.width='100%';
              }
              this.syncHTML();
            }
          });
        },
        findSelectedMedia(){
          const sel = window.getSelection();
          if (sel && sel.rangeCount){
            let el = sel.getRangeAt(0).commonAncestorContainer;
            el = el.nodeType===1?el:el.parentElement;
            while (el && el !== this.$refs.editor){
              if (el.tagName==='IMG' || el.tagName==='IFRAME') return el;
              el = el.parentElement;
            }
          }
          // fallback: highlighted
          const hi = this.$refs.editor.querySelector('img[style*="outline"],iframe[style*="outline"]');
          return hi || null;
        },
        highlight(el){
          this.$refs.editor.querySelectorAll('img, iframe').forEach(x=>{ x.style.outline=''; x.style.outlineOffset=''; });
          el.style.outline='2px solid rgb(59,130,246)'; el.style.outlineOffset='2px';
        },

        // === Helpers ===
        insertAtSelection(html){
          const sel = window.getSelection();
          if (sel && sel.rangeCount){
            const r = sel.getRangeAt(0); r.deleteContents();
            const frag = r.createContextualFragment(html);
            const last = frag.lastChild;
            r.insertNode(frag);
            // move caret
            r.setStartAfter(last); r.setEndAfter(last);
            sel.removeAllRanges(); sel.addRange(r);
          } else {
            this.$refs.editor.insertAdjacentHTML('beforeend', html);
          }
          this.updateState();
        },
        readPreview(e,key){
          const f = e.target.files?.[0]; if (!f) return;
          const r = new FileReader(); r.onload = ev => { this[key] = ev.target.result; }; r.readAsDataURL(f);
        },
        maybeFillMetaAndExcerpt(ev){
          const t = ev.target.value;
          const mt = document.getElementById('meta_title');
          const ex = document.getElementById('excerpt');
          if (mt && !mt.value) mt.value = t;
          if (ex && !ex.value) ex.value = t;
        },
        insertTestVideo(){
          const html = `<div class="media-container my-4 w-full"><div class="relative text-center"><iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" width="560" height="315" frameborder="0" allowfullscreen class="mx-auto block max-w-full rounded-lg border border-slate-200 dark:border-slate-600"></iframe></div></div>`;
          document.execCommand('insertHTML', false, html);
          this.syncHTML(); this.attachMediaHandlers();
        },
        moveFirstImageTop(){
          const img = this.$refs.editor.querySelector('img'); if (!img) return alert('No image found');
          this.$refs.editor.insertBefore(img.closest('span')||img, this.$refs.editor.firstChild);
          this.syncHTML();
        },
        resetImageModal(){ this.image={alt:''}; if (this.$refs.imageFile) this.$refs.imageFile.value=''; },
        resetVideoModal(){ this.video={url:'', width:560, height:315}; },
        escape(s){ return (s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); },

        // Preview
        openPreview(){
          this.syncHTML();
          const form = new FormData(document.getElementById('blogForm'));
          const data = {
            title: form.get('title'),
            content: this.$refs.editor.innerHTML,
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
    .btn{ padding:.375rem .625rem; border:1px solid rgb(203 213 225); border-radius:.375rem; background:#fff; font-size:.875rem }
    .btn:hover{ background:#f8fafc }
    .dark .btn{ background:#0f172a; border-color:#475569; color:#e5e7eb }
    .dark .btn:hover{ background:#1f2937 }
    
    /* Media Container Styles */
    .media-container {
      width: 100%;
      max-width: 100%;
      overflow: hidden;
      position: relative;
    }
    
    .media-container img,
    .media-container iframe {
      max-width: 100%;
      height: auto;
      display: block;
    }
    
    /* Editor Content Styles */
    #editor {
      word-wrap: break-word;
      overflow-wrap: break-word;
    }
    
    #editor img,
    #editor iframe {
      max-width: 100% !important;
      height: auto !important;
    }
    
    /* Ensure media doesn't break layout */
    #editor .media-container {
      clear: both;
      margin: 1rem 0;
    }
    
    #editor .media-container.float-left {
      float: left;
      margin-right: 1rem;
      margin-bottom: 1rem;
    }
    
    #editor .media-container.float-right {
      float: right;
      margin-left: 1rem;
      margin-bottom: 1rem;
    }
    
    #editor .media-container.text-center {
      text-align: center;
      display: block;
    }
    
    #editor .media-container.w-full {
      width: 100%;
      display: block;
    }
    
    /* Modal z-index */
    dialog {
      z-index: 9999;
    }
  </style>
</x-app-layout>
