<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'], // Пути, для которых применяется CORS

    'allowed_methods' => ['*'], // Разрешенные HTTP-методы (GET, POST, PUT, DELETE и т.д.)

    'allowed_origins' => ['*'], // Разрешенные домены (используйте '*' для всех)

    'allowed_origins_patterns' => [], // Паттерны для разрешенных доменов

    'allowed_headers' => ['*'], // Разрешенные заголовки

    'exposed_headers' => [], // Заголовки, которые будут доступны клиенту

    'max_age' => 0, // Время кэширования CORS-запросов (в секундах)

    'supports_credentials' => false, // Разрешить отправку учетных данных (куки, заголовки авторизации)
];
