<nav x-data="{ open: false }" class="navbar">
    <div class="w-full flex justify-center">
        <div class="flex justify-between w-full sm:max-w-sm md:max-w-md lg:max-w-2xl xl:max-w-5xl 2xl:max-w-7xl">
            
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

            <div class="flex items-center">

                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9" />
                            </svg>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                            <li>
                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Log Out') }}</a>
                            </li>
                        </ul>
                    </form>

                </div>
            </div>

        </div>
    </div>
</nav>
