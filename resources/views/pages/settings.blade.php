<x-app-layout title="Settings" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            Webapp Settings
          </h2>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-8">
            <div class="card p-4 sm:p-5">
              <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-6">General Settings</h3>
              
              <div class="space-y-6">
                <!-- Theme Settings -->
                <div>
                  <h4 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">Theme Preferences</h4>
                  <div class="space-y-3">
                    <label class="flex items-center space-x-3">
                      <input type="radio" name="theme" value="light" class="form-radio" checked>
                      <span class="text-sm text-slate-600 dark:text-navy-200">Light Theme</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="radio" name="theme" value="dark" class="form-radio">
                      <span class="text-sm text-slate-600 dark:text-navy-200">Dark Theme</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="radio" name="theme" value="auto" class="form-radio">
                      <span class="text-sm text-slate-600 dark:text-navy-200">Auto (System)</span>
                    </label>
                  </div>
                </div>

                <!-- Language Settings -->
                <div>
                  <h4 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">Language</h4>
                  <select class="form-select w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2">
                    <option>English</option>
                    <option>اردو</option>
                    <option>پنجابی</option>
                  </select>
                </div>

                <!-- Timezone Settings -->
                <div>
                  <h4 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">Timezone</h4>
                  <select class="form-select w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2">
                    <option>Asia/Karachi (PKT)</option>
                    <option>UTC</option>
                    <option>America/New_York</option>
                  </select>
                </div>

                <!-- Notification Settings -->
                <div>
                  <h4 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">Notification Preferences</h4>
                  <div class="space-y-3">
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox" checked>
                      <span class="text-sm text-slate-600 dark:text-navy-200">Email notifications</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox" checked>
                      <span class="text-sm text-slate-600 dark:text-navy-200">Push notifications</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox">
                      <span class="text-sm text-slate-600 dark:text-navy-200">SMS notifications</span>
                    </label>
                  </div>
                </div>

                <!-- Privacy Settings -->
                <div>
                  <h4 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">Privacy Settings</h4>
                  <div class="space-y-3">
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox" checked>
                      <span class="text-sm text-slate-600 dark:text-navy-200">Show online status</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox">
                      <span class="text-sm text-slate-600 dark:text-navy-200">Allow profile visibility</span>
                    </label>
                    <label class="flex items-center space-x-3">
                      <input type="checkbox" class="form-checkbox" checked>
                      <span class="text-sm text-slate-600 dark:text-navy-200">Activity tracking</span>
                    </label>
                  </div>
                </div>

                <!-- Save Button -->
                <div class="pt-4">
                  <button class="btn bg-primary text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                    Save Settings
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-4">Quick Actions</h3>
              
              <div class="space-y-3">
                <button class="w-full btn bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-navy-600 dark:text-navy-100 dark:hover:bg-navy-500 text-left">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                  </svg>
                  Export Data
                </button>
                
                <button class="w-full btn bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-navy-600 dark:text-navy-100 dark:hover:bg-navy-500 text-left">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                  Change Password
                </button>
                
                <button class="w-full btn bg-red-100 text-red-600 hover:bg-red-200 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30 text-left">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                  </svg>
                  Delete Account
                </button>
              </div>

              <div class="mt-6 pt-4 border-t border-slate-200 dark:border-navy-500">
                <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-3">System Info</h4>
                <div class="space-y-2 text-xs text-slate-500 dark:text-navy-300">
                  <div class="flex justify-between">
                    <span>Version:</span>
                    <span>1.0.0</span>
                  </div>
                  <div class="flex justify-between">
                    <span>Last Updated:</span>
                    <span>2024-01-15</span>
                  </div>
                  <div class="flex justify-between">
                    <span>Storage Used:</span>
                    <span>2.4 GB</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</x-app-layout>




