{{-- Language Switcher Component --}}
<div class="language-switcher relative">
    <button class="lang-btn flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 hover:text-primary-300 transition-colors" aria-label="Language Selector">
        @if(app()->getLocale() == 'ur')
            <span class="fi fi-pk"></span>
            <span>{{ __('common.urdu') }}</span>
        @else
            <span class="fi fi-us"></span>
            <span>{{ __('common.english') }}</span>
        @endif
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
            <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
        </svg>
    </button>
    
    <div class="lang-dropdown absolute top-full right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg min-w-[120px] opacity-0 invisible transition-all duration-200 z-50">
        <div class="py-2">
            <a href="{{ route('language.switch', 'en') }}" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-50 transition-colors {{ app()->getLocale() == 'en' ? 'text-primary-300 font-medium' : 'text-gray-700' }}">
                <span class="fi fi-us"></span>
                <span>{{ __('common.english') }}</span>
            </a>
            <a href="{{ route('language.switch', 'ur') }}" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-50 transition-colors {{ app()->getLocale() == 'ur' ? 'text-primary-300 font-medium' : 'text-gray-700' }}">
                <span class="fi fi-pk"></span>
                <span>{{ __('common.urdu') }}</span>
            </a>
        </div>
    </div>
</div>

<style>
.language-switcher:hover .lang-dropdown {
    opacity: 1;
    visibility: visible;
}

/* Flag icon fallback if not using flag-icons library */
.fi::before {
    content: "🌐";
}
.fi-us::before {
    content: "🇺🇸";
}
.fi-pk::before {
    content: "🇵🇰";
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const langBtn = document.querySelector('.lang-btn');
    const langDropdown = document.querySelector('.lang-dropdown');
    
    if (langBtn && langDropdown) {
        langBtn.addEventListener('click', function(e) {
            e.preventDefault();
            langDropdown.classList.toggle('opacity-0');
            langDropdown.classList.toggle('invisible');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
                langDropdown.classList.add('opacity-0');
                langDropdown.classList.add('invisible');
            }
        });
    }
});
</script>