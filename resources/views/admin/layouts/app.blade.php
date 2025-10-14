<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ-панель')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom Admin Panel Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .sidebar-nav .nav-link {
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        
        .sidebar-nav .nav-link:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .main-content {
            background-color: #ffffff;
            min-height: calc(100vh - 80px);
            border-radius: 8px;
            margin: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 25px rgba(0,0,0,0.12);
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border: none;
            font-weight: 600;
            color: #495057;
        }
        
        .badge {
            border-radius: 20px;
            padding: 6px 12px;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block" style="min-height: 100vh; background-color: #2c3e50;">
                <!-- Logo -->
                <div class="p-3" style="background-color: #2c3e50;">
                    <img src="{{ asset('assets/images/ltm.png') }}" 
                         alt="LTM Studio" 
                         class="img-fluid w-100" 
                         style="filter: brightness(0) invert(1);">
                </div>
                
                <!-- Navigation -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white py-3 px-3 {{ Request::routeIs('admin.portfolios.*') ? 'bg-primary' : '' }}" 
                           href="{{ route('admin.portfolios.index') }}"
                           style="border: none; transition: all 0.2s;"
                           onmouseover="{{ Request::routeIs('admin.portfolios.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
                           onmouseout="{{ Request::routeIs('admin.portfolios.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
                            <i class="fas fa-briefcase me-2"></i>
                            Портфолио
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-3 px-3 {{ Request::routeIs('admin.categories.*') ? 'bg-primary' : '' }}" 
                           href="{{ route('admin.categories.index') }}"
                           style="border: none; transition: all 0.2s;"
                           onmouseover="{{ Request::routeIs('admin.categories.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
                           onmouseout="{{ Request::routeIs('admin.categories.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
                            <i class="fas fa-tags me-2"></i>
                            Категории
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-3 px-3 {{ Request::routeIs('admin.news.*') ? 'bg-primary' : '' }}" 
                           href="{{ route('admin.news.index') }}"
                           style="border: none; transition: all 0.2s;"
                           onmouseover="{{ Request::routeIs('admin.news.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
                           onmouseout="{{ Request::routeIs('admin.news.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
                            <i class="fas fa-newspaper me-2"></i>
                            Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-3 px-3 {{ Request::routeIs('admin.users.*') ? 'bg-primary' : '' }}" 
                           href="{{ route('admin.users.index') }}"
                           style="border: none; transition: all 0.2s;"
                           onmouseover="{{ Request::routeIs('admin.users.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
                           onmouseout="{{ Request::routeIs('admin.users.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
                            <i class="fas fa-users me-2"></i>
                            Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-3 px-3 {{ Request::routeIs('admin.contacts.*') ? 'bg-primary' : '' }}" 
                           href="{{ route('admin.contacts.index') }}"
                           style="border: none; transition: all 0.2s;"
                           onmouseover="{{ Request::routeIs('admin.contacts.*') ? '' : 'this.style.backgroundColor=\'#34495e\'' }}"
                           onmouseout="{{ Request::routeIs('admin.contacts.*') ? '' : 'this.style.backgroundColor=\'\'' }}">
                            <i class="fas fa-envelope me-2"></i>
                            Заявки
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-0">
                <!-- Top Horizontal Navbar -->
                <nav class="navbar navbar-expand-lg px-4 py-3" style="background-color: #2c3e50;">
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 text-white me-4">@yield('page-title', 'Dashboard')</h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="text-white me-3">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form-nav').submit();"
                                   class="btn btn-outline-light btn-sm">
                                    Выйти
                                </a>
                                <form id="logout-form-nav" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <div class="main-content">
                    <div class="p-4">
                        
                        <!-- Page Content -->
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Toast Container -->
    <div id="toast-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toast notification system
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toastId = 'toast-' + Date.now();
            
            const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
            const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
            
            const toastHTML = `
                <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas ${iconClass} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', toastHTML);
            
            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: 4000
            });
            
            toast.show();
            
            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                toastElement.remove();
            });
        }
        
        // Check for flash messages and show toasts
        document.addEventListener('DOMContentLoaded', function() {
            // Success message
            @if(session('success'))
                showToast('{{ session('success') }}', 'success');
            @endif
            
            // Error message
            @if(session('error'))
                showToast('{{ session('error') }}', 'error');
            @endif
            
            // Validation errors
            @if($errors->any())
                @foreach($errors->all() as $error)
                    showToast('{{ $error }}', 'error');
                @endforeach
            @endif
            
            
            // Add loading states to forms
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = 'Сохранение...';
                        submitBtn.disabled = true;
                    }
                });
            });
        });
    </script>
</body>
</html>