<x-base-layout title="Register - Punjab Fisheries">
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
            <img class="size-12" src="{{ asset('images/app-logo.svg') }}" alt="logo" />
            <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
                Department of Fisheries, Punjab
            </p>
        </a>
    </div>

    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-lg p-6">
            <img class="w-full" x-show="!$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-meet.svg') }}" alt="image" />
            <img class="w-full" x-show="$store.global.isDarkModeEnabled"
                src="{{ asset('images/illustrations/dashboard-meet-dark.svg') }}" alt="image" />
        </div>
    </div>

    <main class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-4xl">
        <div class="flex w-full max-w-3xl grow flex-col justify-center p-5">
            <div class="text-center">
                <img class="mx-auto size-16 lg:hidden" src="{{ asset('images/app-logo.svg') }}" alt="logo" />
                <div class="mt-4">
                    <h2 class="text-3xl font-semibold text-slate-600 dark:text-navy-100">
                        Welcome To Department of Fisheries, Punjab
                    </h2>
                    <p class="text-slate-400 dark:text-navy-300 mt-2">
                        Complete your staff profile registration to continue
                    </p>
                </div>
            </div>

            <!-- Social Login Buttons -->
            <div class="mt-8 flex space-x-4">
                <button class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <img class="size-5.5" src="{{ asset('images/logos/google.svg') }}" alt="logo" />
                    <span>Google</span>
                </button>
                <button class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <img class="size-5.5" src="{{ asset('images/logos/github.svg') }}" alt="logo" />
                    <span>Github</span>
                </button>
            </div>

            <div class="my-7 flex items-center space-x-3">
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                <p class="text-tiny-plus uppercase">or register with email</p>
                <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            </div>

            <!-- Comprehensive Registration Form -->
            <form class="mt-6" action="{{ route('register') }}" method="post">
                @method('POST') @csrf

                <!-- Account Information Section -->
                <div class="bg-slate-50 dark:bg-navy-800/50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-100 mb-4">
                        Account Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Full Name" type="text" name="name" value="{{ old('name') }}" required />
                            </label>
                            @error('name')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Email Address" type="email" name="email" value="{{ old('email') }}" required />
                            </label>
                            @error('email')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Password" type="password" name="password" required />
                            </label>
                            @error('password')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Confirm Password" type="password" name="password_confirmation" required />
                            </label>
                            @error('password_confirmation')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Staff Information Section -->
                <div class="bg-slate-50 dark:bg-navy-800/50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-100 mb-4">
                        Staff Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Staff ID" type="text" name="staff_id" value="{{ old('staff_id') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Designation (e.g., Fisheries Officer)" type="text" name="designation" value="{{ old('designation') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Phone Number" type="tel" name="phone" value="{{ old('phone') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Joining Date" type="date" name="joining_date" value="{{ old('joining_date') }}" required />
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Organizational Information Section -->
                <div class="bg-slate-50 dark:bg-navy-800/50 rounded-lg p-4 mb-6">
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-100 mb-4">
                     Organizational Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Office Name" type="text" name="office_name" value="{{ old('office_name') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Directorate Name" type="text" name="directorate_name" value="{{ old('directorate_name') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Division Name" type="text" name="division_name" value="{{ old('division_name') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="District Name" type="text" name="district_name" value="{{ old('district_name') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Office Location" type="text" name="office_location" value="{{ old('office_location') }}" required />
                            </label>
                        </div>

                        <div>
                            <label class="relative flex">
                                <input class="form-input peer w-full rounded-lg bg-white dark:bg-navy-900 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-50 focus:ring-3 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-800 dark:focus:bg-navy-800"
                                    placeholder="Section" type="text" name="section" value="{{ old('section', 'Department of Fisheries') }}" required />
                            </label>
                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <button type="submit" class="btn mt-6 h-12 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 text-lg">
                  Register              </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center text-sm">
                <p class="text-slate-600 dark:text-navy-300">
                    Already have an account?
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent font-medium"
                        href="{{ route('loginView') }}">Sign In</a>
                </p>
            </div>
        </div>
    </main>
</x-base-layout>
