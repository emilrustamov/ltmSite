<ul class="nav flex-column sidebar-nav">
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.dashboard') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.dashboard') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.dashboard') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
        </a>
    </li>
    @if(Auth::user()->hasPermission('portfolio.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.portfolios.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.portfolios.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.portfolios.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.portfolios.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-briefcase me-2"></i>
            Портфолио
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('categories.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.categories.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.categories.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.categories.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.categories.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-tags me-2"></i>
            Категории
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('news.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.news.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.news.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.news.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.news.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-newspaper me-2"></i>
            Новости
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('applications.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.applications.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.applications.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.applications.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.applications.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-file-alt me-2"></i>
            Заявки кандидатов
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('contacts.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.contacts.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.contacts.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.contacts.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.contacts.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-envelope me-2"></i>
            Контакты
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('users.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.users.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.users.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.users.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.users.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-users me-2"></i>
            Пользователи
        </a>
    </li>
    @endif
    @if(Auth::user()->hasPermission('applications.view'))
    <li class="nav-item">
        <a class="nav-link text-white py-3 px-3 {{ request()->routeIs('admin.job-positions.*') ? 'bg-primary' : '' }}" 
           href="{{ route('admin.job-positions.index') }}"
           style="border: none; transition: all 0.2s;"
           onmouseover="{{ request()->routeIs('admin.job-positions.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
           onmouseout="{{ request()->routeIs('admin.job-positions.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
            <i class="fas fa-briefcase me-2"></i>
            Должности
        </a>
    </li>
    @endif
</ul>
