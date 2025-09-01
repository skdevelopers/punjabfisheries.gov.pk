<x-app-layout title="Messages" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Messages & Tasks
          </h2>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <!-- Chat List -->
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="relative mb-4">
                <input type="text" placeholder="Search messages..." class="form-input w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-10 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" />
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 size-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>

              <div class="space-y-2">
                <div class="flex items-center space-x-3 rounded-lg bg-primary/10 p-3 dark:bg-accent/10">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                    <div class="absolute bottom-0 right-0 size-3 rounded-full border-2 border-white bg-success dark:border-navy-700"></div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <h3 class="font-medium text-slate-700 dark:text-navy-100">Fisheries Department</h3>
                    <p class="text-sm text-slate-500 dark:text-navy-300 truncate">New license application received</p>
                  </div>
                  <div class="text-right">
                    <span class="text-xs text-slate-400 dark:text-navy-400">2m</span>
                    <div class="mt-1 size-2 rounded-full bg-primary dark:bg-accent"></div>
                  </div>
                </div>

                <div class="flex items-center space-x-3 rounded-lg p-3 hover:bg-slate-100 dark:hover:bg-navy-600 cursor-pointer">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                  </div>
                  <div class="flex-1 min-w-0">
                    <h3 class="font-medium text-slate-700 dark:text-navy-100">Marine Resources</h3>
                    <p class="text-sm text-slate-500 dark:text-navy-300 truncate">Weekly report submitted</p>
                  </div>
                  <div class="text-right">
                    <span class="text-xs text-slate-400 dark:text-navy-400">1h</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Chat Area -->
          <div class="col-span-12 lg:col-span-8">
            <div class="card h-[600px] flex flex-col">
              <div class="flex items-center justify-between border-b border-slate-200 p-4 dark:border-navy-500">
                <div class="flex items-center space-x-3">
                  <div class="avatar size-10">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                    <div class="absolute bottom-0 right-0 size-2.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></div>
                  </div>
                  <div>
                    <h3 class="font-medium text-slate-700 dark:text-navy-100">Fisheries Department</h3>
                    <p class="text-xs text-slate-400 dark:text-navy-400">Online</p>
                  </div>
                </div>
              </div>

              <div class="flex-1 overflow-y-auto p-4 space-y-4">
                <div class="flex items-start space-x-3">
                  <div class="avatar size-8">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                  </div>
                  <div class="max-w-xs">
                    <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                      <p class="text-sm text-slate-700 dark:text-navy-100">Hello! A new license application has been submitted for review.</p>
                    </div>
                    <span class="text-xs text-slate-400 dark:text-navy-400 mt-1 block">2:30 PM</span>
                  </div>
                </div>

                <div class="flex items-start space-x-3 justify-end">
                  <div class="max-w-xs">
                    <div class="rounded-lg bg-primary p-3 text-white dark:bg-accent">
                      <p class="text-sm">Thanks! I'll review it right away.</p>
                    </div>
                    <span class="text-xs text-slate-400 dark:text-navy-400 mt-1 block text-right">2:32 PM</span>
                  </div>
                  <div class="avatar size-8">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                  </div>
                </div>
              </div>

              <div class="border-t border-slate-200 p-4 dark:border-navy-500">
                <div class="flex items-center space-x-3">
                  <input type="text" placeholder="Type your message..." class="form-input flex-1 rounded-full border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" />
                  <button class="btn size-8 rounded-full bg-primary p-0 text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
