<nav x-data="{ open: false }" class="navbar">
    <div class="w-full sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="flex-1 shrink-0 flex items-center">
                <a href="{{ route('/') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">

                @if (!empty($links) && count($links) > 1)
                    @foreach ($links as $link)
                        <x-nav-link href="{{ route($link) }}" :active="request()->routeIs($link)">{{ __($link) }}</x-nav-link>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="flex items-center ms-3 sm:ms-6 relative">

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                        alt="Tailwind CSS Navbar component"
                        {{--
                        alt="{{ Auth::user()->name }}"
                        src="{{ Auth::user()->profile_photo_url }}" />
                        --}}
                        src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" /> <!-- placeholder hasta tener imagenes -->
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li><a href="{{ route('profile.show') }}">{{ __('perfil') }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
