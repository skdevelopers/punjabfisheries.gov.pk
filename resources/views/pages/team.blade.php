<x-app-layout title="Team" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Team Activity
          </h2>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <!-- Team Members -->
          <div class="col-span-12 lg:col-span-8">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100">Team Members</h3>
                <button class="btn bg-primary text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                  Add Member
                </button>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Team Member 1 -->
                <div class="flex items-center space-x-3 p-4 rounded-lg border border-slate-200 dark:border-navy-500">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                    <div class="absolute bottom-0 right-0 size-3 rounded-full border-2 border-white bg-success dark:border-navy-700"></div>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-medium text-slate-700 dark:text-navy-100">Ahmed Khan</h4>
                    <p class="text-sm text-slate-500 dark:text-navy-300">Senior Fisheries Officer</p>
                    <p class="text-xs text-slate-400 dark:text-navy-400">Online</p>
                  </div>
                  <button class="btn size-8 rounded-full p-0 hover:bg-slate-100 dark:hover:bg-navy-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </button>
                </div>

                <!-- Team Member 2 -->
                <div class="flex items-center space-x-3 p-4 rounded-lg border border-slate-200 dark:border-navy-500">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                  </div>
                  <div class="flex-1">
                    <h4 class="font-medium text-slate-700 dark:text-navy-100">Fatima Ali</h4>
                    <p class="text-sm text-slate-500 dark:text-navy-300">Marine Biologist</p>
                    <p class="text-xs text-slate-400 dark:text-navy-400">Last seen 2h ago</p>
                  </div>
                  <button class="btn size-8 rounded-full p-0 hover:bg-slate-100 dark:hover:bg-navy-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </button>
                </div>

                <!-- Team Member 3 -->
                <div class="flex items-center space-x-3 p-4 rounded-lg border border-slate-200 dark:border-navy-500">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                    <div class="absolute bottom-0 right-0 size-3 rounded-full border-2 border-white bg-success dark:border-navy-700"></div>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-medium text-slate-700 dark:text-navy-100">Muhammad Hassan</h4>
                    <p class="text-sm text-slate-500 dark:text-navy-300">Aquaculture Specialist</p>
                    <p class="text-xs text-slate-400 dark:text-navy-400">Online</p>
                  </div>
                  <button class="btn size-8 rounded-full p-0 hover:bg-slate-100 dark:hover:bg-navy-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </button>
                </div>

                <!-- Team Member 4 -->
                <div class="flex items-center space-x-3 p-4 rounded-lg border border-slate-200 dark:border-navy-500">
                  <div class="avatar size-12">
                    <img class="rounded-full" src="{{ asset('images/200x200.png') }}" alt="avatar" />
                  </div>
                  <div class="flex-1">
                    <h4 class="font-medium text-slate-700 dark:text-navy-100">Ayesha Malik</h4>
                    <p class="text-sm text-slate-500 dark:text-navy-300">Research Assistant</p>
                    <p class="text-xs text-slate-400 dark:text-navy-400">Last seen 1d ago</p>
                  </div>
                  <button class="btn size-8 rounded-full p-0 hover:bg-slate-100 dark:hover:bg-navy-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Team Stats -->
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-4">Team Statistics</h3>
              
              <div class="space-y-4">
                <div class="flex items-center justify-between">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Total Members</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">12</span>
                </div>
                
                <div class="flex items-center justify-between">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Online Now</span>
                  <span class="text-lg font-semibold text-green-600 dark:text-green-400">5</span>
                </div>
                
                <div class="flex items-center justify-between">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Active Projects</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">8</span>
                </div>
                
                <div class="flex items-center justify-between">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Tasks Completed</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">156</span>
                </div>
              </div>

              <div class="mt-6 pt-4 border-t border-slate-200 dark:border-navy-500">
                <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-3">Recent Activity</h4>
                <div class="space-y-3">
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <span class="text-xs text-slate-600 dark:text-navy-200">Ahmed completed license review</span>
                  </div>
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                    <span class="text-xs text-slate-600 dark:text-navy-200">Fatima submitted research report</span>
                  </div>
                  <div class="flex items-center space-x-3">
                    <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                    <span class="text-xs text-slate-600 dark:text-navy-200">Hassan started new project</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>




