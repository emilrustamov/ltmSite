<nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Page Title -->
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                @hasSection('breadcrumbs')
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            @yield('breadcrumbs')
                        </ol>
                    </nav>
                @endif
            </div>
            
            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                @auth
                    <!-- User Info -->
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <!-- Notifications -->
                    <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400"></span>
                    </button>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center text-sm text-gray-700 hover:text-gray-900 focus:outline-none">
                            <i class="fas fa-chevron-down ml-1"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Профиль
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Настройки
                            </a>
                            <hr class="my-1">
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt mr-2"></i>Выход
                            </a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-sm font-medium text-gray-700 hover:text-blue-600">
                        Войти
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
