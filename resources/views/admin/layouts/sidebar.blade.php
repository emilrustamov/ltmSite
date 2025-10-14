<aside class="sidebar w-64 text-white flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center">
            <img src="{{ asset('/assets/images/ltm-white.png') }}" alt="LTM Studio" class="w-8 h-8 mr-3">
            <div>
                <h1 class="text-lg font-bold">LTM Studio</h1>
                <p class="text-xs text-gray-400">Админ-панель</p>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 py-6">
        <div class="px-4 mb-6">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Навигация</p>
        </div>
        
        <ul class="space-y-2 px-4">
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ Request::is('admin') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3 w-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.projects.index') }}" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ Request::is('admin/projects*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase mr-3 w-5"></i>
                    <span>Проекты</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.categories.index') }}" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ Request::is('admin/categories*') ? 'active' : '' }}">
                    <i class="fas fa-tags mr-3 w-5"></i>
                    <span>Категории</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.news.index') }}" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ Request::is('admin/news*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper mr-3 w-5"></i>
                    <span>Новости</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ Request::is('admin/users*') ? 'active' : '' }}">
                    <i class="fas fa-users mr-3 w-5"></i>
                    <span>Пользователи</span>
                </a>
            </li>
        </ul>
        
        <div class="px-4 mt-8 mb-6">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Система</p>
        </div>
        
        <ul class="space-y-2 px-4">
            <li>
                <a href="{{ url('/') }}" target="_blank" 
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg">
                    <i class="fas fa-external-link-alt mr-3 w-5"></i>
                    <span>Перейти на сайт</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="sidebar-link flex items-center px-4 py-3 rounded-lg text-red-400 hover:text-red-300 hover:bg-red-900">
                    <i class="fas fa-sign-out-alt mr-3 w-5"></i>
                    <span>Выход</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    
    <!-- Footer -->
    <div class="p-4 border-t border-gray-700">
        <p class="text-xs text-gray-400 text-center">
            &copy; {{ date('Y') }} LTM Studio
        </p>
    </div>
</aside>
