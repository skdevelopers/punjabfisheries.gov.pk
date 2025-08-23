<x-app-layout title="Jobs Board" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Jobs Board
            </h3>

            <div>
                <a href="#"
                    class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">Create
                    Resume</a>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 sm:order-last sm:col-span-7 sm:ml-4 lg:col-span-8 xl:col-span-9">
                <div class="flex items-center justify-between space-x-3 sm:space-x-5">
                    <div class="flex w-full max-w-lg">
                        <label class="relative flex w-full">
                            <input
                                class="form-input peer h-9 w-full rounded-l-lg bg-white px-3 py-2 shadow-soft ring-primary/50 placeholder:text-slate-400 focus:ring-3 dark:bg-navy-700 dark:shadow-none dark:ring-accent/50 dark:placeholder:text-navy-300 lg:pl-9"
                                placeholder="Profession, position or company..." type="text" />
                            <span
                                class="pointer-events-none absolute hidden h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent lg:flex">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor"
                                    viewbox="0 0 24 24">
                                    <path
                                        d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z" />
                                </svg>
                            </span>
                        </label>
                        <button
                            class="btn h-9 rounded-l-none bg-primary px-3 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 lg:px-5">
                            <span class="hidden lg:inline-flex">Search</span>
                            <svg class="h-4.5 w-4.5 lg:hidden" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex">
                        <button
                            class="btn h-8 w-8 shrink-0 rounded-full p-0 text-slate-700 hover:bg-slate-300/20 hover:text-primary focus:bg-slate-300/20 focus:text-primary active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:hover:text-accent dark:focus:bg-navy-300/20 dark:focus:text-accent dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    d="M22 6.5h-9.5M6 6.5H2M9 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM22 17.5h-6M9.5 17.5H2M13 20a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                            </svg>
                        </button>
                        <button
                            class="btn h-8 w-8 shrink-0 rounded-full p-0 text-slate-700 hover:bg-slate-300/20 hover:text-primary focus:bg-slate-300/20 focus:text-primary active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:hover:text-accent dark:focus:bg-navy-300/20 dark:focus:text-accent dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path
                                    d="M3 2.5h-.5v4H6.501V6L6.5 3v-.5H3zM3 10h-.5v4H6.501v-.5l-.001-3V10H3zm0 7.5h-.5v4H6.501V21L6.5 18v-.5H3zM6 7H3c-.551 0-1-.45-1-1V3c0-.55.449-1 1-1h3c.551 0 1 .45 1 1v3c0 .55-.449 1-1 1zm15.75-2.75a.25.25 0 110 .5h-12a.25.25 0 110-.5h12zM6 14.5H3c-.551 0-1-.45-1-1v-3c0-.55.449-1 1-1h3c.551 0 1 .45 1 1v3c0 .55-.449 1-1 1zm15.75-2.75a.25.25 0 110 .5h-12a.25.25 0 110-.5h12zM6 22H3c-.551 0-1-.45-1-1v-3c0-.55.449-1 1-1h3c.551 0 1 .45 1 1v3c0 .55-.449 1-1 1zm15.75-2.75a.25.25 0 110 .5h-12a.25.25 0 110-.5h12z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                        Job founds: 64
                    </p>
                    <div class="flex items-center space-x-2">
                        <span>1 - 25 of 1234</span>
                        <div class="flex">
                            <button
                                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 gap-4 sm:gap-5 lg:grid-cols-2 lg:gap-6 xl:grid-cols-3">
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/microsoft.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        UI/UX Designer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">USA, Washington DC</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$11,000 - $13,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 1 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/airbnb.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Web Developer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">UK, London</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$8,000 - $11,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Part Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 2 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/bitcoin.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Product Designer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Australia, Sydney</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$11,000 - $15,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 3 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/dribbble.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        UI Designer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Austria, Vienna</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">6,600</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Part Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 1 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/facebook.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Frontend Developer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Germany, Berlin</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$9,000 - $10,500</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 3 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/github.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        UI/UX Designer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Sweden, Stockholm</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$25,000 - $28,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 5 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/google.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Web Developer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Switzerland, Zurich</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$30,000 - $35,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 8 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/solana.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Software Engineer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">Australia, Sydney</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$10,000 - $12,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 1 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card p-5">
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-lg object-cover object-center"
                                    src="{{asset('images/logos/slack.svg')}}" alt="image" />
                                <div>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Product Designer
                                    </p>
                                    <a href="#"
                                        class="text-xs hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100">Company
                                        Name</a>
                                </div>
                            </div>
                            <p class="mt-4 text-xs-plus line-clamp-3">
                                UX design refers to the term “user experience design”, while
                                UI stands for “user interface design”
                            </p>
                            <div class="mt-3 space-y-2 text-xs-plus">
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">London, England</span>
                                </p>
                                <p class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="inline h-5 w-5 text-slate-400 dark:text-navy-300" fill="none"
                                        viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-slate-700 dark:text-navy-100">$21,000 - $25,000</span>
                                </p>
                            </div>
                            <div class="inline-space mt-4 flex flex-wrap">
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Full Time
                                </div>
                                <div
                                    class="badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                    Min 1 Year
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 flex justify-between">
                            <button
                                class="btn h-9 bg-primary text-xs-plus font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Apply Now
                            </button>
                            <button
                                class="btn h-9 w-9 rounded-full bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-45" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-5 lg:col-span-4 xl:col-span-3">
                <div>
                    <h3 class="text-sm-plus font-medium text-slate-700 dark:text-navy-100">
                        Suggestions
                    </h3>
                    <div class="inline-space mt-4 flex flex-wrap">
                        <a href="#"
                            class="tag h-7 rounded-full bg-primary text-xs-plus text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Your Skill
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-slate-150 text-xs-plus text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-700 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            UI Design
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-slate-150 text-xs-plus text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-700 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Software Engineer
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-slate-150 text-xs-plus text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-700 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Vue
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-slate-150 text-xs-plus text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-700 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            UX Designer
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-primary text-xs-plus text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Marketing
                        </a>
                        <a href="#"
                            class="tag h-7 rounded-full bg-slate-150 text-xs-plus text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-700 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Web Developer
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            Salary Range
                        </h3>

                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                class="border-b border-dashed border-current pb-0.5 text-xs-plus font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                                USD
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div
                                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">USD</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">EUR
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">CAD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-2.5">
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input checked
                                    class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="salary_range" type="radio" />
                                <span>From 600$</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                1254
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="salary_range" type="radio" />
                                <span>From 1000$</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                985
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="salary_range" type="radio" />
                                <span>From 1500$</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                750
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="salary_range" type="radio" />
                                <span>From 3000$</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                544
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    name="salary_range" type="radio" />
                                <span>From 5000$</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                323
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            Work Experience
                        </h3>
                    </div>

                    <div class="mt-3 space-y-2.5">
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Doesn't matter</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                654
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input checked
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>More than 1 year</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                321
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input checked
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>More than 3 year</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                125
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>More than 5 year</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                111
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>More than 6 year</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                98
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            Type of Employment
                        </h3>
                    </div>

                    <div class="mt-3 space-y-2.5">
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Full time</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                522
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input checked
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Part time</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                456
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Flexible schedule</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                954
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input checked
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Remote working</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                556
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Project work</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                425
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="inline-flex items-center space-x-2">
                                <input
                                    class="form-checkbox is-outline h-5 w-5 rounded-sm border-slate-400/70 bg-white before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                                    type="checkbox" />
                                <span>Work placement</span>
                            </label>
                            <div
                                class="badge h-5 rounded-full bg-slate-150 px-1.5 text-slate-800 dark:bg-navy-500 dark:text-navy-100">
                                597
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <h3 class="font-medium text-slate-700 dark:text-navy-100">
                            Featured Companies
                        </h3>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-5">
                        <a href="#" class="card items-center justify-center px-2 py-4 text-center text-xs-plus">
                            <img class="h-12 w-12" src="{{asset('images/logos/slack.svg')}}" alt="image" />
                            <p class="mt-1">Slack Ltd</p>
                            <p class="mt-1 font-medium text-primary dark:text-accent-light">
                                21 Vacancy
                            </p>
                        </a>
                        <a href="#" class="card items-center justify-center px-2 py-4 text-center text-xs-plus">
                            <img class="h-12 w-12" src="{{asset('images/logos/airbnb.svg')}}" alt="image" />
                            <p class="mt-1">Airbnb</p>
                            <p class="mt-1 font-medium text-primary dark:text-accent-light">
                                8 Vacancy
                            </p>
                        </a>
                        <a href="#" class="card items-center justify-center px-2 py-4 text-center text-xs-plus">
                            <img class="h-12 w-12" src="{{asset('images/logos/solana.svg')}}" alt="image" />
                            <p class="mt-1">Solana</p>
                            <p class="mt-1 font-medium text-primary dark:text-accent-light">
                                6 Vacancy
                            </p>
                        </a>
                        <a href="#" class="card items-center justify-center px-2 py-4 text-center text-xs-plus">
                            <img class="h-12 w-12" src="{{asset('images/logos/bitcoin.svg')}}" alt="image" />
                            <p class="mt-1">Bitcoin</p>
                            <p class="mt-1 font-medium text-primary dark:text-accent-light">
                                16 Vacancy
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
