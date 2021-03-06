<div class="bg-base-200 p-4 flex flex-row space-x-4 justify-between items-center">
    <a href="{{ url('') }}" class="cursor-pointer h-8 w-8">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </a>
    <ul class="flex flex-row justify-center items-center space-x-4">
        <li><a href="{{ route('home') }}" class="{{ Request::route()->getName() === 'home' ? 'text-secondary font-bold' : '' }}">HOME</a></li>
        <li><a href="{{ route('explore') }}" class="{{ Request::route()->getName() === 'explore' ? 'text-secondary font-bold' : '' }}">EXPLORE</a></li>
        <li><a href="#">INFORMATION</a></li>
        <li><a href="#">ABOUT US</a></li>
        @can('team')
            <li><a href="{{ route('d.home') }}" class="{{ Request::is("dashboard*") ? 'text-secondary font-bold' : '' }}">DASHBOARD</a></li>
        @endcan
    </ul>
    <div class="form-control flex flex-row items-center space-x-4">
        <span class="flex items-center" @click="setTema()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
              </svg>
            <label class="cursor-pointer label">
              <input type="checkbox" x-model="dark" class="toggle toggle-primary" id="tema">
            </label>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
              </svg>
        </span>
        <div class="relative" x-data="{menu : false}">
            @if (Auth::user())
            <span  >
                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-full h-8 w-8 cursor-pointer"  @click="menu = !menu" @click.outside="menu = false">
            </span>
            @else
                <a class="btn btn-ghost btn-sm" href="{{ route('auth.login') }}">SIGN IN</a>
            @endif
            {{-- Modal User --}}
            <div class="menu-custom absolute z-50  top-12 right-0" x-show="menu" x-transition>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Profil</span>
                </a>
                <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                        </svg>
                        <button>Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

