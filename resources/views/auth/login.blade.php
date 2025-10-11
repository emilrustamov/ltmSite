<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Вход в админ-панель - LTM Studio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .login-header p {
            font-size: 14px;
            opacity: 0.9;
        }
        .login-body {
            padding: 40px 30px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }
        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .form-input.is-invalid {
            border-color: #f56565;
        }
        .invalid-feedback {
            color: #f56565;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .checkbox-wrapper input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            cursor: pointer;
        }
        .checkbox-wrapper label {
            font-size: 14px;
            color: #4a5568;
            cursor: pointer;
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }
        .btn-login:active {
            transform: translateY(0);
        }
        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }
        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-danger {
            background-color: #fed7d7;
            color: #c53030;
            border: 1px solid #fc8181;
        }
        .logo-container {
            margin-bottom: 10px;
        }
        .logo-container img {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('assets/images/ltm-white.png') }}" alt="LTM Studio">
            </div>
            <h1>Добро пожаловать</h1>
            <p>Войдите в админ-панель LTM Studio</p>
        </div>
        
        <div class="login-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        class="form-input @error('email') is-invalid @enderror" 
                        name="email"
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        autofocus
                        placeholder="Введите ваш email"
                    >
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Пароль
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        class="form-input @error('password') is-invalid @enderror"
                        name="password" 
                        required 
                        autocomplete="current-password"
                        placeholder="Введите пароль"
                    >
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="checkbox-wrapper">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label for="remember">Запомнить меня</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Войти
                </button>

                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            <i class="fas fa-question-circle"></i> Забыли пароль?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
