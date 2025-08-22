<x-base-layout title="Ai Chat App" is-sidebar-open="true">
    <!-- Sidebar -->
    <div class="sidebar print:hidden">
        <!-- Main Sidebar -->
        <x-app-partials.main-sidebar></x-app-partials.main-sidebar>

        <!-- Sidebar Panel -->
        <div class="sidebar-panel">
            <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
                <!-- Sidebar Panel Header -->
                <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                    <div class="flex items-center">
                        <div class="avatar mr-3 hidden size-9 lg:flex">
                            <div class="is-initial rounded-full bg-warning/10 text-warning">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-lg font-medium tracking-wider text-slate-800 line-clamp-1 dark:text-navy-100">
                            Ai Chat
                        </p>
                    </div>

                    <button @click="$store.global.isSidebarExpanded = false"
                        class="btn size-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar Panel Body -->
                <div class="flex h-[calc(100%-4.5rem)] grow flex-col">
                    <div class="mt-2 px-4">
                        <button
                            class="btn w-full space-x-2 rounded-full border border-slate-200 py-2 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                            <span> New Chat </span>
                        </button>
                    </div>
                    <ul class="space-y-1.5 px-2 pt-4 font-inter font-medium">
                        <li>
                            <a class="group flex justify-between space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                href="#">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                        class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z">
                                        </path>
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Favorites</span>
                                </div>
                                <span class="text-primary dark:text-accent-light">2</span>
                            </a>
                        </li>
                        <li>
                            <a class="group flex justify-between space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                href="#">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                        class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z">
                                        </path>
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Archived</span>
                                </div>
                                <span class="text-primary dark:text-accent-light">43</span>
                            </a>
                        </li>
                        <li>
                            <a class="group flex justify-between space-x-2 rounded-lg p-2 tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                href="#">
                                <div class="flex items-center space-x-2">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 256 256"
                                        class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M237.66,66.34a8,8,0,0,0-11.32,0L192,100.69,155.31,64l34.35-34.34a8,8,0,1,0-11.32-11.32L144,52.69,117.66,26.34a8,8,0,0,0-11.32,11.32L112.69,44l-53,53a40,40,0,0,0,0,56.57l15.71,15.71L26.34,218.34a8,8,0,0,0,11.32,11.32l49.09-49.09,15.71,15.71a40,40,0,0,0,56.57,0l53-53,6.34,6.35a8,8,0,0,0,11.32-11.32L203.31,112l34.35-34.34A8,8,0,0,0,237.66,66.34ZM147.72,185a24,24,0,0,1-33.95,0L71,142.23a24,24,0,0,1,0-33.95l53-53L200.69,132Z">
                                        </path>
                                    </svg>
                                    <span class="text-slate-800 dark:text-navy-100">Plugins</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="my-4 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="flex flex-col grow overflow-hidden">
                        <div class="flex min-w-0 items-center justify-between px-4">
                            <span class="truncate text-tiny-plus font-medium uppercase">Recent Chats</span>
                            <button
                                class="btn -mr-1.5 size-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="overflow-y-auto is-scrollbar-hidden min-w-0 px-2 pt-1">
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you fly?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Not on my own! I exist only in the digital world, but
                                            I can help you research amazing flying creatures or
                                            plan a trip to see them in person.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Do you have emotions?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            I can't feel emotions myself, but I can understand and
                                            respond to yours! Tell me how you're feeling today.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Will robots take over the world?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Science fiction is fun, but AI's purpose is to assist
                                            humans, not replace them. We can work together to make
                                            the world a better place.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the meaning of life?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            That's a big question philosophers have pondered for
                                            centuries! There's no one answer, but I can help you
                                            explore different ideas or find resources on the
                                            topic.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you write a song for me?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            I can definitely help you brainstorm ideas and write
                                            some creative lyrics! Just tell me the genre or theme
                                            you have in mind.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the best way to win the lottery?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Unfortunately, there's no guaranteed way. But I can
                                            share some fun facts about lotteries or help you
                                            research responsible budgeting tips.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's your favorite color?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            As a language model, I don't have preferences like
                                            colors. However, I can tell you some interesting facts
                                            about the science of color perception!
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you predict the future?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            I can't see the future, but I can access and analyze
                                            vast amounts of information to help you make informed
                                            decisions for the future.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the best pizza topping?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            That's entirely up to your taste! But I can share some
                                            interesting pizza history or help you find recipes for
                                            unique toppings.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Are you sentient?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Sentience is a complex topic. While I can process
                                            information and respond in a way that may seem
                                            intelligent, I don't have my own consciousness.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you solve this math problem?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Absolutely! Just type out the problem, and I'll do my
                                            best to solve it for you.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the capital of Atlantis?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Atlantis is a mythical lost city. While there are many
                                            theories about its location, there's no scientific
                                            evidence to confirm its existence.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            How do I become a millionaire?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            There's no guaranteed path, but I can help you
                                            research different investment strategies or find
                                            resources on how to build wealth responsibly.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you write a poem for me?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Sure, I can help you craft a poem! Tell me a theme or
                                            some keywords you'd like to include, and I'll generate
                                            some creative verses.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the best way to travel to Mars?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Space travel is still under development, but I can
                                            share some exciting advancements in rocket technology
                                            and missions to Mars!
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you speak in different languages?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Yes, I can translate between many languages and even
                                            generate text in some! Just tell me the language you'd
                                            like.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the best joke you know?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Humor is subjective, but I can share some silly puns
                                            or riddles to give you a laugh!
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Can you write a computer program for me?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            I can't write entire programs, but I can help you
                                            understand coding concepts or generate basic code
                                            snippets based on your needs.
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            Who is the strongest person in the world?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Strength can be physical or mental. I can share
                                            stories of inspiring people who demonstrate different
                                            forms of strength!
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div role="button"
                                class="group flex space-x-2 w-full min-w-0 items-start justify-start p-2 text-xs-plus rounded-lg tracking-wide text-slate-800 outline-hidden transition-all hover:bg-slate-100 focus:bg-slate-100 dark:text-navy-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5 shrink-0 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <div class="-mt-px flex min-w-0 flex-1 items-center justify-between gap-2 text-start">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-slate-700 dark:text-navy-100">
                                            What's the weather like on Mars?
                                        </p>
                                        <div class="mt-1 truncate text-xs text-slate-400 dark:text-navy-300">
                                            Mars has a very thin atmosphere, making weather quite
                                            different from Earth. It's very cold and dry!
                                        </div>
                                    </div>
                                    <button
                                        class="btn p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 opacity-0 size-5 rounded-full group-hover:opacity-100 group-focus:opacity-100 -mr-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-4 stroke-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex h-10 shrink-0 justify-between border-t border-slate-150 px-1.5 py-1 dark:border-navy-600">
                        <button x-tooltip="'Settings'"
                            class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="size-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                            </svg>
                        </button>
                        <div class="flex">
                            <button x-tooltip="'Feedback'"
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z">
                                    </path>
                                </svg>
                            </button>
                            <button x-tooltip="'Help'"
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                    class="size-4.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <x-app-partials.right-sidebar></x-app-partials.right-sidebar>

    <!-- Main Content Wrapper -->
    <main class="main-content chat-app h-100vh mt-0 flex flex-col w-full min-w-0 supports-[height:1dvh]:h-dvh">
        <div
            class="chat-header relative z-10 flex h-[61px] w-full shrink-0 items-center justify-between border-b border-slate-150 bg-white px-[calc(var(--margin-x)-.5rem)] shadow-xs transition-[padding,width] duration-[.25s] dark:border-navy-700 dark:bg-navy-800">
            <div class="flex min-w-0 items-center gap-1">
                <div class="ml-1 size-7">
                    <button
                        class="menu-toggle cursor-pointer ml-0.5 flex size-7 flex-col justify-center space-y-1.5 text-primary outline-hidden focus:outline-hidden dark:text-accent-light/80"
                        :class="$store.global.isSidebarExpanded && 'active'"
                        @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div x-data="usePopper({ placement: 'bottom-start', offset: 4 })" @click.outside="isShowPopper && (isShowPopper = false)"
                    class="inline-flex">
                    <button
                        class="btn space-x-2 font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
                        x-ref="popperRef" @click="isShowPopper = !isShowPopper">
                        <span>GPT 4</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-transform duration-200"
                            :class="isShowPopper && 'rotate-180'" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                        <div
                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <ul>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">ChatGPT
                                        3</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">ChatGPT
                                        4</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Copilot</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Copilot
                                        Pro</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex space-x-3 items-center">
                <div class="flex space-x-2">
                    <!-- Main Searchbar -->
                    <template x-if="$store.breakpoints.smAndUp">
                        <div class="flex" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
                            @click.outside="isShowPopper && (isShowPopper = false)">
                            <div class="relative mr-4 flex h-8">
                                <input placeholder="Search here..."
                                    class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs-plus text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring-3 dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                                    :class="isShowPopper ? 'w-80' : 'w-60'" @focus="isShowPopper= true" type="text"
                                    x-ref="popperRef" />
                                <div
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="size-4.5 transition-colors duration-200" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z" />
                                    </svg>
                                </div>
                            </div>
                            <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                                <div
                                    class="popper-box flex max-h-[calc(100vh-6rem)] w-80 flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark">
                                    <div x-data="{ activeTab: 'tabAll' }"
                                        class="is-scrollbar-hidden flex shrink-0 overflow-x-auto rounded-t-lg bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                        <button @click="activeTab = 'tabAll'"
                                            :class="activeTab === 'tabAll' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            All
                                        </button>
                                        <button @click="activeTab = 'tabFiles'"
                                            :class="activeTab === 'tabFiles' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            Files
                                        </button>
                                        <button @click="activeTab = 'tabChats'"
                                            :class="activeTab === 'tabChats' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            Chats
                                        </button>
                                        <button @click="activeTab = 'tabEmails'"
                                            :class="activeTab === 'tabEmails' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            Emails
                                        </button>
                                        <button @click="activeTab = 'tabProjects'"
                                            :class="activeTab === 'tabProjects' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            Projects
                                        </button>
                                        <button @click="activeTab = 'tabTasks'"
                                            :class="activeTab === 'tabTasks' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            Tasks
                                        </button>
                                    </div>

                                    <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                                        <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                                            <a href="apps-kanban.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-success text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Kanban
                                                </p>
                                            </a>
                                            <a href="dashboards-crm-analytics.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-secondary text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Analytics
                                                </p>
                                            </a>
                                            <a href="apps-chat.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-info text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Chat
                                                </p>
                                            </a>
                                            <a href="apps-filemanager.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-error text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Files
                                                </p>
                                            </a>
                                            <a href="dashboards-crypto-1.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-secondary text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Crypto
                                                </p>
                                            </a>
                                            <a href="dashboards-banking-1.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div
                                                        class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Banking
                                                </p>
                                            </a>
                                            <a href="apps-todo.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-info text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path d="M12.5293 18L20.9999 8.40002"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M3 13.2L7.23529 18L17.8235 6"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Todo
                                                </p>
                                            </a>
                                            <a href="dashboards-crm-analytics.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-secondary text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Analytics
                                                </p>
                                            </a>
                                            <a href="dashboards-orders.html" class="w-14 text-center">
                                                <div class="avatar size-12">
                                                    <div class="is-initial rounded-full bg-warning text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <p
                                                    class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                    Orders
                                                </p>
                                            </a>
                                        </div>

                                        <div
                                            class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                                            <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                                Recent
                                            </p>
                                            <a href="#"
                                                class="text-tiny-plus font-medium uppercase text-primary outline-hidden transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                                                View All
                                            </a>
                                        </div>

                                        <div class="mt-1 font-inter font-medium">
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="apps-chat.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                                <span>Chat App</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="apps-filemanager.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                                </svg>
                                                <span>File Manager App</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="apps-mail.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <span>Email App</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="apps-kanban.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                </svg>
                                                <span>Kanban Board</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="apps-todo.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span>Todo App</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="dashboards-crypto-2.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <span>Crypto Dashboard</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="dashboards-banking-2.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                                </svg>

                                                <span>Banking Dashboard</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="dashboards-crm-analytics.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                                </svg>

                                                <span>Analytics Dashboard</span>
                                            </a>
                                            <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                href="dashboards-influencer.html">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>

                                                <span>Influencer Dashboard</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Dark Mode Toggle -->
                    <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg x-show="$store.global.isDarkModeEnabled"
                            x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                            x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                            class="size-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled"
                            x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                            x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                            class="size-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Notification-->
                    <div x-effect="if($store.global.isSearchbarActive) isShowPopper = false" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
                        @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
                        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef"
                            class="btn relative size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-500 dark:text-navy-100"
                                stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z" />
                            </svg>

                            <span class="absolute -top-px -right-px flex size-3 items-center justify-center">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"></span>
                                <span class="inline-flex size-2 rounded-full bg-secondary"></span>
                            </span>
                        </button>
                        <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                            <div x-data="{ activeTab: 'tabAll' }"
                                class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
                                <div
                                    class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                    <div class="flex items-center justify-between px-4 pt-2">
                                        <div class="flex items-center space-x-2">
                                            <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                                Notifications
                                            </h3>
                                            <div
                                                class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                26
                                            </div>
                                        </div>

                                        <button
                                            class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="is-scrollbar-hidden flex shrink-0 overflow-x-auto px-3">
                                        <button @click="activeTab = 'tabAll'"
                                            :class="activeTab === 'tabAll' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>All</span>
                                        </button>
                                        <button @click="activeTab = 'tabAlerts'"
                                            :class="activeTab === 'tabAlerts' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Alerts</span>
                                        </button>
                                        <button @click="activeTab = 'tabEvents'"
                                            :class="activeTab === 'tabEvents' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Events</span>
                                        </button>
                                        <button @click="activeTab = 'tabLogs'"
                                            :class="activeTab === 'tabLogs' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Logs</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="tab-content flex flex-col overflow-hidden">
                                    <div x-show="activeTab === 'tabAll'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                <i
                                                    class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    User Photo Changed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    John Doe changed his avatar photo
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, June 14, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">08:00 - 09:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Frontend Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Images Added
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Mores Clarke added new image gallery
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                <i class="fa fa-leaf text-success"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Design Completed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Robert Nolan completed the design of the CRM
                                                    application
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, June 21, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">16:00 - 20:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">UI/UX Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <i class="fa fa-project-diagram text-warning"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    ER Diagram
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Team completed the ER diagram app
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    THU, May 11, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">10:00 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Konnor Guzman
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                <i class="fa fa-history text-error"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Weekly Report
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    The weekly report was uploaded
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabAlerts'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                <i
                                                    class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    User Photo Changed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    John Doe changed his avatar photo
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Images Added
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Mores Clarke added new image gallery
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                <i class="fa fa-leaf text-success"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Design Completed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Robert Nolan completed the design of the CRM
                                                    application
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <i class="fa fa-project-diagram text-warning"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    ER Diagram
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Team completed the ER diagram app
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                <i class="fa fa-history text-error"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Weekly Report
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    The weekly report was uploaded
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabEvents'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, June 14, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">08:00 - 09:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Frontend Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, June 21, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">16:00 - 20:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">UI/UX Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    THU, May 11, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">10:00 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Konnor Guzman
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, Jul 16, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">06:00 - 16:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Laravel Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, Jun 16, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">15:30 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Jonh Doe
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabLogs'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden overflow-y-auto px-4">
                                        <div class="mt-8 pb-8 text-center">
                                            <img class="mx-auto w-36"
                                                src="{{ asset('images/illustrations/empty-girl-box.svg') }}"
                                                alt="image" />
                                            <div class="mt-5">
                                                <p class="text-base font-semibold text-slate-700 dark:text-navy-100">
                                                    No any logs
                                                </p>
                                                <p class="text-slate-400 dark:text-navy-300">
                                                    There are no unread logs yet
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Sidebar Toggle -->
                    <button @click="$store.global.isRightSidebarExpanded = true"
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5.5 text-slate-500 dark:text-navy-100"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                </div>

                <button class="btn space-x-2 bg-linear-to-r from-green-400 to-blue-600 font-medium text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true" data-slot="icon" class="size-4">
                        <path fill-rule="evenodd"
                            d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z"
                            clip-rule="evenodd"></path>
                        <path fill-rule="evenodd"
                            d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="max-sm:hidden"> Try Ai Pro </span>
                </button>
            </div>
        </div>

        <div :class="$store.breakpoints.smAndUp && 'scrollbar-sm'"
            class="overflow-y-auto mx-auto w-full max-w-(--breakpoint-lg) xl:px-12 grow space-y-8 py-4">
            <div class="px-4 pt-6 text-[clamp(2.2rem,3.75vw,3.75rem)] font-medium leading-[1.1] tracking-tight">
                <span
                    class="block animate-shimmer bg-linear-to-r from-violet-400 via-red-400 to-fuchsia-400 bg-clip-text font-semibold text-transparent"
                    style="animation-duration: 5s; background-size: 200% 100%">Welcome, John Doe</span><span
                    class="block text-slate-400 dark:text-navy-300">May I be of assistance today?</span>
            </div>

            <div class="flex w-full shrink-0 gap-5 px-4 pt-8 lg:pt-16 max-lg:overflow-x-auto lg:grid lg:grid-cols-4">
                <div class="card group flex shrink-0 flex-col p-3 max-lg:w-48 lg:-rotate-3">
                    <div class="grow">
                        <h3>
                            Don't worry, this update is quicker than your internet history
                            deletion!
                        </h3>
                    </div>
                    <div class="flex justify-end pt-6">
                        <div class="btn shrink-0 p-0 bg-slate-150 text-slate-900 dark:bg-navy-500 dark:text-navy-50 size-8 rounded-full"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 cursor-pointer rounded-lg bg-black/10 opacity-0 transition-colors group-hover:opacity-100">
                    </div>
                </div>
                <div class="card group flex shrink-0 flex-col p-3 max-lg:w-48 lg:rotate-3">
                    <div class="grow">
                        <h3>
                            A majestic bird soars high above a crystal-clear glacial lake,
                            its wings catching the sunlight.
                        </h3>
                    </div>
                    <div class="flex justify-end pt-6">
                        <div class="btn shrink-0 p-0 bg-slate-150 text-slate-900 dark:bg-navy-500 dark:text-navy-50 size-8 rounded-full"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 cursor-pointer rounded-lg bg-black/10 opacity-0 transition-colors group-hover:opacity-100">
                    </div>
                </div>
                <div class="card group flex shrink-0 flex-col p-3 max-lg:w-48 lg:-rotate-3">
                    <div class="grow">
                        <h3>
                            For Wallace the walrus, the perfect day starts with a
                            leisurely swim in the icy Arctic waters
                        </h3>
                    </div>
                    <div class="flex justify-end pt-6">
                        <div class="btn shrink-0 p-0 bg-slate-150 text-slate-900 dark:bg-navy-500 dark:text-navy-50 size-8 rounded-full"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 cursor-pointer rounded-lg bg-black/10 opacity-0 transition-colors group-hover:opacity-100">
                    </div>
                </div>
                <div class="card group flex shrink-0 flex-col p-3 max-lg:w-48 lg:rotate-3">
                    <div class="grow">
                        <h3>
                            The best time to stretch is whenever your body feels tight or
                            stiff!
                        </h3>
                    </div>
                    <div class="flex justify-end pt-6">
                        <div class="btn shrink-0 p-0 bg-slate-150 text-slate-900 dark:bg-navy-500 dark:text-navy-50 size-8 rounded-full"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute inset-0 cursor-pointer rounded-lg bg-black/10 opacity-0 transition-colors group-hover:opacity-100">
                    </div>
                </div>
            </div>

            <div class="space-y-8 pt-6 lg:pt-12 px-2 sm:px-4">
                <div class="space-y-4">
                    <div class="flex items-end justify-end gap-2.5 ml-4 sm:ml-10">
                        <div
                            class="relative break-words print:border max-w-lg rounded-2xl bg-slate-150 p-3 dark:bg-navy-700 rounded-br">
                            Do you have emotions?
                        </div>
                        <div class="avatar max-sm:hidden">
                            <img class="rounded-full" src="{{ asset('images/200x200.png') }}"
                                alt="avatar" />
                        </div>
                    </div>
                    <div class="flex items-end justify-start gap-2.5 mr-4 sm:mr-10">
                        <div class="size-10 max-sm:hidden">
                            <div class="avatar">
                                <div class="is-initial rounded-full bg-info text-white">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" class="size-5" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative break-words print:border w-full max-w-lg rounded-2xl rounded-bl border border-slate-200 p-3 dark:border-navy-600">
                            <div class="text-sm-plus">
                                I can't feel emotions myself, but I can understand and
                                respond to yours! Tell me how you're feeling today.
                            </div>
                            <div class="-mx-1 flex justify-between pt-8">
                                <div class="flex space-x-1">
                                    <button x-tooltip="'Copy'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Share'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Report Issue'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <button x-tooltip="'Bad Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Good Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-end justify-end gap-2.5 ml-4 sm:ml-10">
                        <div
                            class="relative break-words print:border max-w-lg rounded-2xl bg-slate-150 p-3 dark:bg-navy-700 rounded-br">
                            Will robots take over the world?
                        </div>
                        <div class="avatar max-sm:hidden">
                            <img class="rounded-full" src="{{ asset('images/200x200.png') }}"
                                alt="avatar" />
                        </div>
                    </div>
                    <div class="flex items-end justify-start gap-2.5 mr-4 sm:mr-10">
                        <div class="size-10 max-sm:hidden">
                            <div class="avatar">
                                <div class="is-initial rounded-full bg-info text-white">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" class="size-5" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative break-words print:border w-full max-w-lg rounded-2xl rounded-bl border border-slate-200 p-3 dark:border-navy-600">
                            <div class="text-sm-plus">
                                Science fiction is fun, but AI's purpose is to assist
                                humans, not replace them. We can work together to make the
                                world a better place.
                            </div>
                            <div class="-mx-1 flex justify-between pt-8">
                                <div class="flex space-x-1">
                                    <button x-tooltip="'Copy'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Share'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Report Issue'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <button x-tooltip="'Bad Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Good Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-end justify-end gap-2.5 ml-4 sm:ml-10">
                        <div
                            class="relative break-words print:border max-w-lg rounded-2xl rounded-br bg-slate-150 p-3 dark:bg-navy-700">
                            What's your favorite color?
                        </div>
                        <div class="avatar max-sm:hidden">
                            <img class="rounded-full" src="{{ asset('images/200x200.png') }}"
                                alt="avatar" />
                        </div>
                    </div>
                    <div class="flex items-end justify-start gap-2.5 mr-4 sm:mr-10">
                        <div class="size-10 max-sm:hidden">
                            <div class="avatar">
                                <div class="is-initial rounded-full bg-info text-white">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" class="size-5" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative break-words print:border w-full max-w-lg rounded-bl rounded-2xl border border-slate-200 p-3 dark:border-navy-600">
                            <div class="text-sm-plus">
                                As a language model, I don't have preferences like colors.
                                However, I can tell you some interesting facts about the
                                science of color perception!
                            </div>
                            <div class="-mx-1 flex justify-between pt-8">
                                <div class="flex space-x-1">
                                    <button x-tooltip="'Copy'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Share'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Report Issue'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <button x-tooltip="'Bad Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Good Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-end justify-end gap-2.5 ml-4 sm:ml-10">
                        <div
                            class="relative break-words print:border max-w-lg rounded-2xl rounded-br bg-slate-150 p-3 dark:bg-navy-700">
                            Can you predict the future?
                        </div>
                        <div class="avatar max-sm:hidden">
                            <img class="rounded-full" src="{{ asset('images/200x200.png') }}"
                                alt="avatar" />
                        </div>
                    </div>
                    <div class="flex items-end justify-start gap-2.5 mr-4 sm:mr-10">
                        <div class="size-10 max-sm:hidden">
                            <div class="avatar">
                                <div class="is-initial rounded-full bg-info text-white">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" class="size-5" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative break-words print:border w-full max-w-lg rounded-2xl rounded-bl border border-slate-200 p-3 dark:border-navy-600">
                            <div class="text-sm-plus">
                                I can't see the future, but I can access and analyze vast
                                amounts of information to help you make informed decisions
                                for the future.
                            </div>
                            <div class="-mx-1 flex justify-between pt-8">
                                <div class="flex space-x-1">
                                    <button x-tooltip="'Copy'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Share'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Report Issue'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <button x-tooltip="'Bad Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Good Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-end justify-end gap-2.5 ml-4 sm:ml-10">
                        <div
                            class="relative break-words print:border max-w-lg rounded-2xl rounded-br bg-slate-150 p-3 dark:bg-navy-700">
                            What's the weather like on Mars?
                        </div>
                        <div class="avatar max-sm:hidden">
                            <img class="rounded-full" src="{{ asset('images/200x200.png') }}"
                                alt="avatar" />
                        </div>
                    </div>
                    <div class="flex items-end justify-start gap-2.5 mr-4 sm:mr-10">
                        <div class="size-10 max-sm:hidden">
                            <div class="avatar">
                                <div class="is-initial rounded-full bg-info text-white">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" class="size-5" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 2C13.5 2.44425 13.3069 2.84339 13 3.11805V5H18C19.6569 5 21 6.34315 21 8V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V8C3 6.34315 4.34315 5 6 5H11V3.11805C10.6931 2.84339 10.5 2.44425 10.5 2C10.5 1.17157 11.1716 0.5 12 0.5C12.8284 0.5 13.5 1.17157 13.5 2ZM6 7C5.44772 7 5 7.44772 5 8V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V8C19 7.44772 18.5523 7 18 7H13H11H6ZM2 10H0V16H2V10ZM22 10H24V16H22V10ZM9 14.5C9.82843 14.5 10.5 13.8284 10.5 13C10.5 12.1716 9.82843 11.5 9 11.5C8.17157 11.5 7.5 12.1716 7.5 13C7.5 13.8284 8.17157 14.5 9 14.5ZM15 14.5C15.8284 14.5 16.5 13.8284 16.5 13C16.5 12.1716 15.8284 11.5 15 11.5C14.1716 11.5 13.5 12.1716 13.5 13C13.5 13.8284 14.1716 14.5 15 14.5Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative break-words print:border w-full max-w-lg rounded-2xl rounded-bl border border-slate-200 p-3 dark:border-navy-600">
                            <div class="text-sm-plus">
                                Mars has a very thin atmosphere, making weather quite
                                different from Earth. It's very cold and dry!
                            </div>
                            <div class="-mx-1 flex justify-between pt-8">
                                <div class="flex space-x-1">
                                    <button x-tooltip="'Copy'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Share'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Report Issue'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex">
                                    <button x-tooltip="'Bad Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.498 15.25H4.372c-1.026 0-1.945-.694-2.054-1.715a12.137 12.137 0 0 1-.068-1.285c0-2.848.992-5.464 2.649-7.521C5.287 4.247 5.886 4 6.504 4h4.016a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23h1.294M7.498 15.25c.618 0 .991.724.725 1.282A7.471 7.471 0 0 0 7.5 19.75 2.25 2.25 0 0 0 9.75 22a.75.75 0 0 0 .75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 0 0 2.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384m-10.253 1.5H9.7m8.075-9.75c.01.05.027.1.05.148.593 1.2.925 2.55.925 3.977 0 1.487-.36 2.89-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398-.306.774-1.086 1.227-1.918 1.227h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 0 0 .303-.54">
                                            </path>
                                        </svg>
                                    </button>
                                    <button x-tooltip="'Good Response'"
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            data-slot="icon" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto w-full max-w-(--breakpoint-lg) xl:px-16 px-3 sm:px-4 pb-4">
            <div
                class="flex h-14 items-center justify-between rounded-full bg-slate-150 px-4 sm:px-6 dark:bg-navy-700">
                <input type="text" class="form-input h-9 w-full bg-transparent placeholder:text-slate-400/70"
                    placeholder="Ask me anything..." />
                <div class="flex">
                    <button
                        class="btn size-9 shrink-0 rounded-full p-0 text-slate-500 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                            class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                            </path>
                        </svg>
                    </button>
                    <button
                        class="btn size-9 shrink-0 rounded-full p-0 text-slate-500 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                            class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>

</x-base-layout>
