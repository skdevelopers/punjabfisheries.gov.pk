<x-app-layout title="Application List" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-12 text-center">
            <div class="avatar size-16">
                <div class="is-initial rounded-full bg-linear-to-br from-pink-500 to-rose-500 text-white">
                    <i class="fa-solid fa-shapes text-2xl"></i>
                </div>
            </div>
            <h3 class="mt-3 text-xl font-semibold text-slate-600 dark:text-navy-100">
                Lineone Applications
            </h3>
            <p class="mt-0.5 text-base">
                List of prebuilt applications of Lineone
            </p>
        </div>
        <div class="mx-auto mt-8 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-info text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Chat App
                </h2>
                <p class="mt-1">
                    Lineone prebuilt Messaging UI kit includes designs for social
                    chat.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/chat') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Kanban Board
                </h2>
                <p class="mt-1">
                    The Kanban Board to keep track of your personal and work tasks.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/kanban') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-secondary text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    File Manager
                </h2>
                <p class="mt-1">
                    Lineone File Manager UI Kit is designed with modern design trends.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/filemanager') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Todo App
                </h2>
                <p class="mt-1">
                    Lineone Todo UI kit is a simple to-do list and an task management
                    app.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/todo') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-warning text-white">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                            </path>
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Ai Chat App
                </h2>
                <p class="mt-1">
                    Lineone Ai Chat is a prebuild AI chatbot that writes text. You can
                    use it to write stories, messages, or programming code.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/ai-chat') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-error text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Mail App
                </h2>
                <p class="mt-1">
                    Lineone prebuilt Mail UI kit includes designs for email system.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/mail') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-success text-white">
                        <i class="fa-solid fa-n text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    NFT Marketplace V1
                </h2>
                <p class="mt-1">
                    Lineone NFT Store UI Kit is responsive and high-quality UI design
                    kit for the NFT marketplace.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/nft1') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-info text-white">
                        <i class="fa-solid fa-n text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    NFT Marketplace V2
                </h2>
                <p class="mt-1">
                    Lineone NFT Store UI Kit is responsive and high-quality UI design
                    kit for the NFT marketplace.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/nft2') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-warning text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Point of Sale
                </h2>
                <p class="mt-1">
                    Lineone POS UI Kit is responsive and high-quality UI design kit
                    for the Point of sale system.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/pos') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                        <i class="fa-solid fa-car-rear text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Travel
                </h2>
                <p class="mt-1">
                    Lineone Travel UI Kit is responsive and high-quality UI design kit
                    for the travel agancy wesites.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/travel') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
            <div class="card p-4 sm:p-5">
                <div class="avatar size-12">
                    <div class="is-initial rounded-full bg-secondary text-white">
                        <i class="fa-solid fa-car-rear text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    Jobs Board
                </h2>
                <p class="mt-1">
                    Lineone Job board is responsive and high-quality UI design kit for
                    the Job board app.
                </p>
                <div class="mt-5 pb-1">
                    <a href="{{ route('apps/jobs-board') }}"
                        class="border-b border-dashed border-current pb-0.5 font-medium text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                        Application</a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
