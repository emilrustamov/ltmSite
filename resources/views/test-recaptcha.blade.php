@extends('layouts.base')

@section('title', 'Тест reCAPTCHA')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6 text-white">Тест reCAPTCHA</h1>
    
    <div class="bg-gray-800 p-6 rounded-lg mb-6">
        <h2 class="text-xl font-semibold mb-4 text-white">Статус конфигурации:</h2>
        <ul class="space-y-2 text-white">
            <li>Site Key: <code class="bg-gray-700 px-2 py-1 rounded">{{ config('services.recaptcha.site_key') ?: 'НЕ НАСТРОЕН' }}</code></li>
            <li>Secret Key: <code class="bg-gray-700 px-2 py-1 rounded">{{ config('services.recaptcha.secret_key') ? 'Настроен ✓' : 'НЕ НАСТРОЕН' }}</code></li>
        </ul>
    </div>

    <div class="bg-gray-800 p-6 rounded-lg mb-6">
        <h2 class="text-xl font-semibold mb-4 text-white">Проверка reCAPTCHA:</h2>
        <button id="testBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg mb-4">
            Проверить reCAPTCHA
        </button>
        <div id="result" class="mt-4 p-4 bg-gray-700 rounded hidden"></div>
    </div>

    <div class="bg-gray-800 p-6 rounded-lg">
        <h2 class="text-xl font-semibold mb-4 text-white">Логи проверки:</h2>
        <div id="logs" class="space-y-2 text-sm text-gray-300 font-mono max-h-96 overflow-y-auto"></div>
    </div>
</div>

@if(config('services.recaptcha.site_key'))
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
@endif

<script>
(function() {
    const testBtn = document.getElementById('testBtn');
    const result = document.getElementById('result');
    const logs = document.getElementById('logs');
    const recaptchaSiteKey = @json(config('services.recaptcha.site_key'));
    
    function addLog(message, type = 'info') {
        const logEntry = document.createElement('div');
        const timestamp = new Date().toLocaleTimeString();
        const colors = {
            info: 'text-blue-400',
            success: 'text-green-400',
            error: 'text-red-400'
        };
        logEntry.className = colors[type] || 'text-gray-300';
        logEntry.textContent = `[${timestamp}] ${message}`;
        logs.appendChild(logEntry);
        logs.scrollTop = logs.scrollHeight;
    }
    
    // Проверка при загрузке страницы
    addLog('Проверка загрузки reCAPTCHA...', 'info');
    
    console.log('grecaptcha loaded:', typeof grecaptcha !== 'undefined');
    addLog(`grecaptcha loaded: ${typeof grecaptcha !== 'undefined'}`, typeof grecaptcha !== 'undefined' ? 'success' : 'error');
    
    console.log('Site key:', recaptchaSiteKey);
    addLog(`Site key: ${recaptchaSiteKey || 'НЕ НАСТРОЕН'}`, recaptchaSiteKey ? 'success' : 'error');
    
    // Попробовать получить токен при загрузке
    if (typeof grecaptcha !== 'undefined' && recaptchaSiteKey) {
        grecaptcha.ready(function() {
            addLog('grecaptcha готов, автоматическая проверка...', 'info');
            grecaptcha.execute(recaptchaSiteKey, {action: 'submit_contact'})
                .then(function(token) {
                    const tokenPreview = token.substring(0, 20) + '...';
                    console.log('✅ reCAPTCHA работает! Токен получен:', tokenPreview);
                    addLog(`✅ reCAPTCHA работает! Токен получен: ${tokenPreview}`, 'success');
                })
                .catch(function(error) {
                    console.error('❌ Ошибка reCAPTCHA:', error);
                    addLog(`❌ Ошибка reCAPTCHA: ${error.message || error}`, 'error');
                });
        });
    }
    
    if (testBtn) {
        testBtn.addEventListener('click', function() {
            result.classList.add('hidden');
            addLog('Начало проверки reCAPTCHA...', 'info');
            
            if (typeof grecaptcha !== 'undefined' && recaptchaSiteKey) {
                grecaptcha.ready(function() {
                    addLog('grecaptcha готов, запрашиваю токен...', 'info');
                    
                    grecaptcha.execute(recaptchaSiteKey, {action: 'submit_contact'})
                        .then(function(token) {
                            const tokenPreview = token.substring(0, 20) + '...';
                            console.log('✅ reCAPTCHA работает! Токен получен:', tokenPreview);
                            addLog(`✅ reCAPTCHA работает! Токен получен: ${tokenPreview}`, 'success');
                            
                            result.classList.remove('hidden');
                            result.className = 'mt-4 p-4 bg-green-900 text-green-200 rounded';
                            result.innerHTML = `
                                <strong>✅ reCAPTCHA работает!</strong><br>
                                Токен получен: <code class="bg-gray-800 px-2 py-1 rounded">${tokenPreview}</code><br>
                                Полный токен: <code class="bg-gray-800 px-2 py-1 rounded text-xs break-all">${token}</code>
                            `;
                        })
                        .catch(function(error) {
                            console.error('❌ Ошибка reCAPTCHA:', error);
                            addLog(`❌ Ошибка reCAPTCHA: ${error.message || error}`, 'error');
                            
                            result.classList.remove('hidden');
                            result.className = 'mt-4 p-4 bg-red-900 text-red-200 rounded';
                            result.innerHTML = `<strong>❌ Ошибка:</strong> ${error.message || error}`;
                        });
                });
            } else {
                addLog('❌ reCAPTCHA не загружен или site key не настроен', 'error');
                result.classList.remove('hidden');
                result.className = 'mt-4 p-4 bg-red-900 text-red-200 rounded';
                result.innerHTML = '<strong>❌ Ошибка:</strong> reCAPTCHA не загружен или site key не настроен';
            }
        });
    }
})();
</script>
@endsection
