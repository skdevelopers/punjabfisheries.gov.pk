<x-app-layout title="Profile" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Fisheries Staff Profile
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a
                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="#"
                >Fisheries</a
              >
              <svg
                x-ignore
                xmlns="http://www.w3.org/2000/svg"
                class="size-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </li>
            <li id="breadcrumb-text">Profile</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center space-x-4">
                <div class="avatar size-14">
                  <img
                    class="rounded-full"
                    src="{{ $user->profile_photo_path ? Storage::url($user->profile_photo_path) : asset('images/200x200.png') }}"
                    alt="avatar"
                  />
                </div>
                <div>
                  <h3
                    class="text-base font-medium text-slate-700 dark:text-navy-100"
                  >
                    {{ $user->name ?? 'Staff Member' }}
                  </h3>
                  <p class="text-xs-plus">{{ $user->designation ?? 'Department of Fisheries' }}</p>
                </div>
              </div>
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a
                    class="nav-item flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    data-tab="profile"
                    onclick="switchTab('profile')"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a
                    class="nav-item flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    data-tab="notifications"
                    onclick="switchTab('notifications')"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                      />
                    </svg>
                    <span>Notifications</span>
                  </a>
                </li>
                <li>
                  <a
                    class="nav-item flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    data-tab="security"
                    onclick="switchTab('security')"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                      />
                    </svg>
                    <span>Security</span>
                  </a>
                </li>
                <li>
                  <a
                    class="nav-item flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    data-tab="fisheries-apps"
                    onclick="switchTab('fisheries-apps')"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                      />
                    </svg>
                    <span>Fisheries Apps</span>
                  </a>
                </li>
                <li>
                  <a
                    class="nav-item flex items-center space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                    data-tab="data-privacy"
                    onclick="switchTab('data-privacy')"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                      />
                    </svg>
                    <span>Data Privacy</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-span-12 lg:col-span-8">
            <!-- Profile Settings Section -->
            <div id="profile-content" class="card">
              <form id="profile-form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div
                  class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
                >
                  <h2
                    class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                  >
                    Profile Settings
                  </h2>
                  <div class="flex justify-center space-x-2">
                    <button
                      type="button"
                      class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                    >
                      Cancel
                    </button>
                    <button
                      type="submit"
                      class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90"
                    >
                      Save
                    </button>
                  </div>
                </div>
                <div class="p-4 sm:p-5">
                  <div class="flex flex-col">
                    <span
                      class="text-base font-medium text-slate-600 dark:text-navy-100"
                      >Profile Photo</span
                    >
                    <div class="avatar mt-1.5 size-20">
                      <img
                        id="profile-photo-preview"
                        class="mask is-squircle"
                        src="{{ $user->profile_photo_path ? Storage::url($user->profile_photo_path) : asset('images/200x200.png') }}"
                        alt="avatar"
                      />
                      <div
                        class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700"
                      >
                        <button
                          type="button"
                          id="profile-photo-btn"
                          class="btn size-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-3.5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                            />
                          </svg>
                        </button>
                      </div>
                    </div>
                    <!-- Hidden file input for profile photo -->
                    <input
                      type="file"
                      id="profile-photo-input"
                      name="profile_photo"
                      accept="image/*"
                      class="hidden"
                    />
                  </div>
                  <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <label class="block">
                      <span>Staff ID</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter Staff ID"
                          type="text"
                          name="staff_id"
                          value="{{ $user->staff_id ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-regular fa-id-badge text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Full Name</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter full name"
                          type="text"
                          name="full_name"
                          value="{{ $user->name ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-regular fa-user text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Designation</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="e.g., Fisheries Officer"
                          type="text"
                          name="designation"
                          value="{{ $user->designation ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-briefcase text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Section</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Department of Fisheries"
                          type="text"
                          name="section"
                          value="{{ $user->section ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-building text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Email Address</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter email address"
                          type="email"
                          name="email"
                          value="{{ $user->email ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-regular fa-envelope text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Phone Number</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter phone number"
                          type="tel"
                          name="phone"
                          value="{{ $user->phone ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa fa-phone"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Office Location</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter office location"
                          type="text"
                          name="office_location"
                          value="{{ $user->office_location ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-location-dot text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Joining Date</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Select joining date"
                          type="date"
                          name="joining_date"
                          value="{{ $user->joining_date ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-regular fa-calendar text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Office Name</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter office name"
                          type="text"
                          name="office_name"
                          value="{{ $user->office_name ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-building text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Directorate Name</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter directorate name"
                          type="text"
                          name="directorate_name"
                          value="{{ $user->directorate_name ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-sitemap text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>Division Name</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter division name"
                          type="text"
                          name="division_name"
                          value="{{ $user->division_name ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-layer-group text-base"></i>
                        </span>
                      </span>
                    </label>
                    <label class="block">
                      <span>District Name</span>
                      <span class="relative mt-1.5 flex">
                        <input
                          class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                          placeholder="Enter district name"
                          type="text"
                          name="district_name"
                          value="{{ $user->district_name ?? '' }}"
                        />
                        <span
                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                        >
                          <i class="fa-solid fa-map-marker-alt text-base"></i>
                        </span>
                      </span>
                    </label>
                  </div>
                  <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                  <div>
                    <h3
                      class="text-base font-medium text-slate-600 dark:text-navy-100"
                    >
                      Fisheries Management Access
                    </h3>
                    <p class="text-xs-plus text-slate-400 dark:text-navy-300">
                      Connect your account with fisheries management systems and tools.
                    </p>
                    <div class="flex items-center justify-between pt-4">
                      <div class="flex items-center space-x-4">
                        <div class="size-12">
                          <img src="{{asset('images/logos/google.svg')}}" alt="logo" />
                        </div>
                        <p class="font-medium line-clamp-1">
                          Connect Your Google Account
                        </p>
                      </div>
                      <button
                        class="btn h-8 rounded-full border border-slate-200 px-3 text-xs-plus font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                      >
                        Connect
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <!-- Notifications Section -->
            <div id="notifications-content" class="card hidden">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Notification Settings
                </h2>
                <div class="flex justify-center space-x-2">
                  <button
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                  >
                    Cancel
                  </button>
                  <button
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >
                    Save
                  </button>
                </div>
              </div>
              <div class="p-4 sm:p-5">
                <div class="space-y-6">
                  <!-- Email Notifications -->
                  <div>
                    <div class="flex items-center justify-between mb-3">
                      <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Email Notifications
                      </h3>
                      <div class="flex items-center space-x-2">
                        <label class="inline-flex items-center cursor-pointer">
                          <input type="checkbox" value="" class="sr-only peer" checked>
                          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        </label>
                      </div>
                    </div>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">System updates and maintenance</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Security alerts</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Newsletter and announcements</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Task assignments and deadlines</span>
                      </label>
                    </div>
                  </div>

                  <!-- Push Notifications -->
                  <div>
                    <div class="flex items-center justify-between mb-3">
                      <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Push Notifications
                      </h3>
                      <div class="flex items-center space-x-2">
                        <label class="inline-flex items-center cursor-pointer">
                          <input type="checkbox" value="" class="sr-only peer" checked>
                          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        </label>
                      </div>
                    </div>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Enable push notifications</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Sound alerts</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Vibration alerts</span>
                      </label>
                    </div>
                  </div>

                  <!-- Notification Frequency -->
                  <div>
                    <div class="flex items-center justify-between mb-3">
                      <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Notification Frequency
                      </h3>
                      <div class="flex items-center space-x-2">
                        <label class="inline-flex items-center cursor-pointer">
                          <input type="checkbox" value="" class="sr-only peer" checked>
                          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        </label>
                      </div>
                    </div>
                    <div class="space-y-3">
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Email frequency</span>
                        <select class="form-select mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2">
                          <option>Immediate</option>
                          <option>Daily digest</option>
                          <option>Weekly digest</option>
                          <option>Monthly digest</option>
                        </select>
                      </label>
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Quiet hours</span>
                        <div class="flex items-center space-x-3 mt-1.5">
                          <input type="time" class="form-input rounded-full border border-slate-300 px-3 py-2" value="22:00">
                          <span class="text-sm text-slate-400">to</span>
                          <input type="time" class="form-input rounded-full border border-slate-300 px-3 py-2" value="08:00">
                        </div>
                      </label>
                    </div>
                  </div>

                  <!-- Notification Types -->
                  <div>
                    <div class="flex items-center justify-between mb-3">
                      <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Specific Notification Types
                      </h3>
                      <div class="flex items-center space-x-2">
                        <label class="inline-flex items-center cursor-pointer">
                          <input type="checkbox" value="" class="sr-only peer" checked>
                          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        </label>
                      </div>
                    </div>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Fisheries management alerts</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Department announcements</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Training and workshop reminders</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Equipment maintenance alerts</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Security Section -->
            <div id="security-content" class="card hidden">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Security Settings
                </h2>
                <div class="flex justify-center space-x-2">
                  <button
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                  >
                    Cancel
                  </button>
                  <button
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >
                    Save
                  </button>
                </div>
              </div>
              <div class="p-4 sm:p-5">
                <div class="space-y-6">
                  <!-- Password Management -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Password Management
                    </h3>
                    <div class="space-y-4">
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Current Password</span>
                        <input type="password" class="form-input mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2" placeholder="Enter current password">
                      </label>
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">New Password</span>
                        <input type="password" class="form-input mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2" placeholder="Enter new password">
                      </label>
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Confirm New Password</span>
                        <input type="password" class="form-input mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2" placeholder="Confirm new password">
                      </label>
                      <button class="btn bg-primary text-white hover:bg-primary-focus dark:bg-accent dark:hover:bg-accent-focus">
                        Change Password
                      </button>
                    </div>
                  </div>

                  <!-- Two-Factor Authentication -->
                  <div>
                    <div class="flex items-center justify-between mb-3">
                      <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Two-Factor Authentication
                      </h3>
                      <div class="flex items-center space-x-2">
                        <label class="inline-flex items-center cursor-pointer">
                          <input type="checkbox" value="" class="sr-only peer">
                          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                        </label>
                      </div>
                    </div>
                    <div class="space-y-3">
                      <p class="text-sm text-slate-500 dark:text-navy-300">Add an extra layer of security to your account</p>
                      <div class="flex items-center space-x-3">
                        <div class="size-12 bg-slate-100 dark:bg-navy-600 rounded-lg flex items-center justify-center">
                          <svg class="w-6 h-6 text-slate-500 dark:text-navy-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                          </svg>
                        </div>
                        <div>
                          <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Authenticator App</p>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Use Google Authenticator or similar apps</p>
                        </div>
                        <button class="btn bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-navy-600 dark:text-navy-100 dark:hover:bg-navy-500">
                          Setup
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Login Security -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Login Security
                    </h3>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Require password for sensitive actions</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Notify on new device login</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Remember login for 30 days</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Block login attempts after 5 failures</span>
                      </label>
                    </div>
                  </div>

                  <!-- Session Management -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Session Management
                    </h3>
                    <div class="space-y-3">
                      <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div>
                          <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Current Session</p>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Windows 10 • Chrome • 127.0.0.1</p>
                        </div>
                        <span class="text-xs text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/20 px-2 py-1 rounded-full">Active</span>
                      </div>
                      <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div>
                          <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Mobile Session</p>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Android • Chrome • 192.168.1.100</p>
                        </div>
                        <span class="text-xs text-slate-500 dark:text-navy-300 bg-slate-100 dark:bg-navy-500 px-2 py-1 rounded-full">2 hours ago</span>
                      </div>
                      <button class="btn bg-red-100 text-red-600 hover:bg-red-200 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30">
                        Terminate All Other Sessions
                      </button>
                    </div>
                  </div>

                  <!-- Security Log -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Recent Security Activity
                    </h3>
                    <div class="space-y-2">
                      <div class="flex items-center space-x-3 p-2 text-sm">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="text-slate-600 dark:text-navy-200">Password changed successfully</span>
                        <span class="text-slate-400 dark:text-navy-400 ml-auto">2 hours ago</span>
                      </div>
                      <div class="flex items-center space-x-3 p-2 text-sm">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        <span class="text-slate-600 dark:text-navy-200">New device login detected</span>
                        <span class="text-slate-400 dark:text-navy-400 ml-auto">1 day ago</span>
                      </div>
                      <div class="flex items-center space-x-2 p-2 text-sm">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                        <span class="text-slate-600 dark:text-navy-200">Failed login attempt blocked</span>
                        <span class="text-slate-400 dark:text-navy-400 ml-auto">3 days ago</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Fisheries Apps Section -->
            <div id="fisheries-apps-content" class="card hidden">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Fisheries Management Apps
                </h2>
                <div class="flex justify-center space-x-2">
                  <button
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                  >
                    Refresh
                  </button>
                </div>
              </div>
              <div class="p-4 sm:p-5">
                <div class="space-y-6">
                  <!-- FMIS Official App -->
                  <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-navy-600 dark:to-navy-700 rounded-xl p-6">
                    <div class="flex items-start space-x-4">
                      <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                          </svg>
                        </div>
                      </div>
                      <div class="flex-1 min-w-0">
                        <div class="flex items-center space-x-2 mb-2">
                          <h3 class="text-xl font-bold text-slate-800 dark:text-navy-100">FMIS Official</h3>
                          <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Official</span>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-navy-200 mb-3">
                          The Fisheries Management Information System (FMIS) is an advanced, integrated platform designed to provide comprehensive management and oversight of fisheries resources.
                        </p>
                        <div class="flex flex-wrap items-center space-x-4 text-xs text-slate-500 dark:text-navy-300 mb-4">
                          <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>100+ Downloads</span>
                          </span>
                          <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                            <span>Productivity</span>
                          </span>
                          <span class="flex items-center space-x-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span>Everyone</span>
                          </span>
                        </div>
                        <div class="flex items-center space-x-3">
                          <a href="https://play.google.com/store/apps/details?id=pk.pitb.gov.fisheriesgismapping" target="_blank" class="btn bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                            <span>Download on Google Play</span>
                          </a>
                          <button class="btn bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-navy-600 dark:text-navy-100 dark:hover:bg-navy-500 px-4 py-2.5 rounded-lg transition-colors duration-200">
                            Learn More
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- App Features -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Key Features
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      <div class="flex items-start space-x-3 p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                          <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                          </svg>
                        </div>
                        <div>
                          <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">Resource Tagging</h4>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Streamline tagging of fisheries resources</p>
                        </div>
                      </div>
                      <div class="flex items-start space-x-3 p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div class="w-8 h-8 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                          <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                          </svg>
                        </div>
                        <div>
                          <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">License Verification</h4>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Accurate verification of licenses</p>
                        </div>
                      </div>
                      <div class="flex items-start space-x-3 p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                          <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                          </svg>
                        </div>
                        <div>
                          <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">Centralized Data</h4>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Centralized data management</p>
                        </div>
                      </div>
                      <div class="flex items-start space-x-3 p-3 bg-slate-50 dark:bg-navy-600 rounded-lg">
                        <div class="w-8 h-8 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                          <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                          </svg>
                        </div>
                        <div>
                          <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">Sustainable Practices</h4>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Support sustainable fisheries practices</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Developer Info -->
                  <div class="border-t border-slate-200 dark:border-navy-500 pt-4">
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Developer Information
                    </h3>
                    <div class="bg-slate-50 dark:bg-navy-600 rounded-lg p-4">
                      <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                          <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                          </svg>
                        </div>
                        <div>
                          <h4 class="text-sm font-medium text-slate-700 dark:text-navy-100">Punjab IT Board</h4>
                          <p class="text-xs text-slate-500 dark:text-navy-300">Government of Punjab, Pakistan</p>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Data Privacy Section -->
            <div id="data-privacy-content" class="card hidden">
              <div
                class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
              >
                <h2
                  class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                >
                  Data Privacy Settings
                </h2>
                <div class="flex justify-center space-x-2">
                  <button
                    class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                  >
                    Cancel
                  </button>
                  <button
                    class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >
                    Save
                  </button>
                </div>
              </div>
              <div class="p-4 sm:p-5">
                <div class="space-y-6">
                  <!-- Data Collection Preferences -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Data Collection Preferences
                    </h3>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Allow analytics data collection</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Allow performance monitoring</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Allow marketing communications</span>
                      </label>
                    </div>
                  </div>

                  <!-- Data Retention -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Data Retention Settings
                    </h3>
                    <div class="space-y-3">
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Profile data retention period</span>
                        <select class="form-select mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2">
                          <option>1 year</option>
                          <option>3 years</option>
                          <option>5 years</option>
                          <option>Indefinitely</option>
                        </select>
                      </label>
                      <label class="block">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Activity log retention</span>
                        <select class="form-select mt-1.5 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2">
                          <option>6 months</option>
                          <option>1 year</option>
                          <option>2 years</option>
                          <option>3 years</option>
                        </select>
                      </label>
                    </div>
                  </div>

                  <!-- Privacy Controls -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Privacy Controls
                    </h3>
                    <div class="space-y-3">
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Profile visibility to other staff members</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox">
                        <span class="text-sm text-slate-600 dark:text-navy-200">Contact information sharing</span>
                      </label>
                      <label class="flex items-center space-x-3">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="text-sm text-slate-600 dark:text-navy-200">Department directory listing</span>
                      </label>
                    </div>
                  </div>

                  <!-- Data Export -->
                  <div>
                    <h3 class="text-base font-medium text-slate-700 dark:text-navy-100 mb-3">
                      Data Export & Deletion
                    </h3>
                    <div class="space-y-3">
                      <button class="btn bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-navy-600 dark:text-navy-100 dark:hover:bg-navy-500">
                        Export My Data
                      </button>
                      <button class="btn bg-red-100 text-red-600 hover:bg-red-200 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/30">
                        Request Data Deletion
                      </button>
                    </div>
                  </div>

                  <!-- Privacy Policy -->
                  <div class="pt-4 border-t border-slate-200 dark:border-navy-500">
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                      By using this system, you agree to our
                      <a href="#" class="text-primary hover:underline dark:text-accent">Privacy Policy</a>
                      and
                      <a href="#" class="text-primary hover:underline dark:text-accent">Terms of Service</a>.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

    <script>
        function switchTab(tabName) {
            // Hide all content sections
            document.getElementById('profile-content').classList.add('hidden');
            document.getElementById('notifications-content').classList.add('hidden');
            document.getElementById('security-content').classList.add('hidden');
            document.getElementById('fisheries-apps-content').classList.add('hidden');
            document.getElementById('data-privacy-content').classList.add('hidden');

            // Remove active state from all nav items
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('bg-primary', 'text-white', 'dark:bg-accent');
                item.classList.add('group');
            });

            // Show selected content and update breadcrumb
            if (tabName === 'profile') {
                document.getElementById('profile-content').classList.remove('hidden');
                document.querySelector('[data-tab="profile"]').classList.add('bg-primary', 'text-white', 'dark:bg-accent');
                document.querySelector('[data-tab="profile"]').classList.remove('group');
                document.getElementById('breadcrumb-text').textContent = 'Profile';
                // Update URL hash
                window.location.hash = '';
            } else if (tabName === 'notifications') {
                document.getElementById('notifications-content').classList.remove('hidden');
                document.querySelector('[data-tab="notifications"]').classList.add('bg-primary', 'text-white', 'dark:bg-accent');
                document.querySelector('[data-tab="notifications"]').classList.remove('group');
                document.getElementById('breadcrumb-text').textContent = 'Notifications';
                // Update URL hash
                window.location.hash = 'notifications';
            } else if (tabName === 'security') {
                document.getElementById('security-content').classList.remove('hidden');
                document.querySelector('[data-tab="security"]').classList.add('bg-primary', 'text-white', 'dark:bg-accent');
                document.querySelector('[data-tab="security"]').classList.remove('group');
                document.getElementById('breadcrumb-text').textContent = 'Security';
                // Update URL hash
                window.location.hash = 'security';
            } else if (tabName === 'fisheries-apps') {
                document.getElementById('fisheries-apps-content').classList.remove('hidden');
                document.querySelector('[data-tab="fisheries-apps"]').classList.add('bg-primary', 'text-white', 'dark:bg-accent');
                document.querySelector('[data-tab="fisheries-apps"]').classList.remove('group');
                document.getElementById('breadcrumb-text').textContent = 'Fisheries Apps';
                // Update URL hash
                window.location.hash = 'fisheries-apps';
            } else if (tabName === 'data-privacy') {
                document.getElementById('data-privacy-content').classList.remove('hidden');
                document.querySelector('[data-tab="data-privacy"]').classList.add('bg-primary', 'text-white', 'dark:bg-accent');
                document.querySelector('[data-tab="data-privacy"]').classList.remove('group');
                document.getElementById('breadcrumb-text').textContent = 'Data Privacy';
                // Update URL hash
                window.location.hash = 'data-privacy';
            }
        }

        // Set active tab based on URL hash or default to Profile
        document.addEventListener('DOMContentLoaded', function() {
            // Check if there's a hash in the URL
            const hash = window.location.hash.substring(1);

            if (hash === 'notifications') {
                switchTab('notifications');
            } else if (hash === 'security') {
                switchTab('security');
            } else if (hash === 'fisheries-apps') {
                switchTab('fisheries-apps');
            } else if (hash === 'data-privacy') {
                switchTab('data-privacy');
            } else {
                // Default to Profile
                switchTab('profile');
            }

            // Profile photo functionality
            const profilePhotoBtn = document.getElementById('profile-photo-btn');
            const profilePhotoInput = document.getElementById('profile-photo-input');
            const profilePhotoPreview = document.getElementById('profile-photo-preview');

            if (profilePhotoBtn && profilePhotoInput && profilePhotoPreview) {
                // Click on pencil button to trigger file input
                profilePhotoBtn.addEventListener('click', function() {
                    profilePhotoInput.click();
                });

                // Handle file selection and preview
                profilePhotoInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Validate file type
                        if (!file.type.startsWith('image/')) {
                            alert('Please select an image file.');
                            return;
                        }

                        // Validate file size (2MB max)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Image size should be less than 2MB.');
                            return;
                        }

                        // Create preview
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            profilePhotoPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Handle form submission
            const profileForm = document.getElementById('profile-form');
            if (profileForm) {
                profileForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    // Show loading state
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Saving...';
                    submitBtn.disabled = true;

                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.name);
                        if (data.success) {
                            // Show success message
                            alert(data.message);

                            // Update profile photo in left panel if it was changed
                            if (data.profile_photo) {
                                const leftPanelPhoto = document.querySelector('.avatar.size-14 img');
                                if (leftPanelPhoto) {
                                    leftPanelPhoto.src = data.profile_photo;
                                }
                            }
                        } else {
                            alert('Error updating profile: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error updating profile. Please try again.');
                    })
                    .finally(() => {
                        // Reset button state
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
                });
            }
        });


    </script>
</x-app-layout>
