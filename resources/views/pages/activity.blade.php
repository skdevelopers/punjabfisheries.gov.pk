<x-app-layout title="Activity" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Activity & Events
          </h2>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-8">
            <div class="card p-4 sm:p-5">
              <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-6">Recent Activity</h3>
              
              <div class="space-y-6">
                <div class="flex items-start space-x-4">
                  <div class="w-10 h-10 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">License Application Approved</h4>
                    <p class="text-sm text-slate-600 dark:text-navy-200">Ahmed Khan approved the fishing license application for vessel PK-1234.</p>
                    <span class="text-xs text-slate-400 dark:text-navy-400">2 hours ago</span>
                  </div>
                </div>

                <div class="flex items-start space-x-4">
                  <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">Research Report Submitted</h4>
                    <p class="text-sm text-slate-600 dark:text-navy-200">Fatima Ali submitted the monthly marine biodiversity research report.</p>
                    <span class="text-xs text-slate-400 dark:text-navy-400">4 hours ago</span>
                  </div>
                </div>

                <div class="flex items-start space-x-4">
                  <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                  </div>
                  <div class="flex-1">
                    <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">New Project Started</h4>
                    <p class="text-sm text-slate-600 dark:text-navy-200">Muhammad Hassan initiated the Aquaculture Development Project.</p>
                    <span class="text-xs text-slate-400 dark:text-navy-400">1 day ago</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-4">Activity Summary</h3>
              
              <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Approvals</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">24</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Reports</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">12</span>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                  <span class="text-sm text-slate-600 dark:text-navy-200">Projects</span>
                  <span class="text-lg font-semibold text-slate-700 dark:text-navy-100">8</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>
