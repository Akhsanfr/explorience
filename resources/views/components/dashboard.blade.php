<div class="flex flex-row items-start">
    <div class="p-8">
        <div class="menu-custom">
            <a href="{{ route('d.home') }}" class="{{ session('page_sidebar') == 'home' ? 'text-secondary' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Home</span>
            </a>
            @can('admin')
                <a href="{{ route('d.user') }}" class="{{ session('page_sidebar') == 'user' ? 'text-secondary' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span>User</span>
                </a>
            @endcan
        </div>
    </div>
    <div class="flex-grow p-8 grid grid-cols-12 gap-8">
        {{ $slot }}
    </div>

</div>
