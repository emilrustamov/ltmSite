<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ-панель - LTM Studio')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            border-left-color: #3b82f6;
        }
        .sidebar-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: white;
            border-left-color: #3b82f6;
        }
        .sidebar-link i {
            width: 24px;
            margin-right: 12px;
            font-size: 18px;
        }
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            background: #f8fafc;
        }
        .top-bar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .dropdown {
            position: relative;
        }
        .dropdown-toggle {
            cursor: pointer;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            z-index: 1000;
        }
        .dropdown.active .dropdown-menu {
            display: block;
        }
        .dropdown-item {
            display: block;
            padding: 12px 16px;
            color: #334155;
            text-decoration: none;
            transition: all 0.2s;
        }
        .dropdown-item:hover {
            background: #f1f5f9;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .mobile-menu-btn {
                display: block !important;
            }
        }
    </style>
</head>

<body>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="LTM Studio" class="w-32 mx-auto">
                <p class="text-center text-gray-400 text-sm mt-2">Админ-панель</p>
            </div>

            <!-- Navigation -->
            <nav class="py-4">
                <div class="px-4 mb-2">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Контент</p>
                </div>
                
                <a href="{{ url((request()->segment(1) ?? 'ru') . '/admin/all-projects') }}" 
                   class="sidebar-link {{ Request::is('*/admin/all-projects*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Проекты</span>
                </a>

                <a href="{{ url((request()->segment(1) ?? 'ru') . '/admin/categories') }}" 
                   class="sidebar-link {{ Request::is('*/admin/categories*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i>
                    <span>Категории</span>
                </a>

                <div class="px-4 mb-2 mt-6">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Система</p>
                </div>

                <a href="{{ url('/') }}" target="_blank" class="sidebar-link">
                    <i class="fas fa-globe"></i>
                    <span>Перейти на сайт</span>
                </a>
            </nav>

            <!-- Footer -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700 bg-gray-900">
                <p class="text-xs text-gray-500 text-center">
                    &copy; {{ date('Y') }} LTM Studio
                </p>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="main-content w-full">
            <!-- Top Bar -->
            <header class="top-bar">
                <div class="flex items-center">
                    <button class="mobile-menu-btn hidden mr-4 text-gray-600" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Панель управления')</h1>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <div class="dropdown" id="userDropdown">
                            <button class="dropdown-toggle flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition" onclick="toggleDropdown('userDropdown')">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user mr-2"></i> Профиль
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-cog mr-2"></i> Настройки
                                </a>
                                <hr class="my-1 border-gray-200">
                                <a href="{{ route('logout') }}" class="dropdown-item text-red-600"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Выход
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">
                            Войти
                        </a>
                    @endauth
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-4">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('active');
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        }

        // Close mobile sidebar when clicking outside
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            if (window.innerWidth <= 768 && 
                !sidebar.contains(e.target) && 
                !menuBtn.contains(e.target) && 
                sidebar.classList.contains('mobile-open')) {
                sidebar.classList.remove('mobile-open');
            }
        });
    </script>
</body>

</html>
