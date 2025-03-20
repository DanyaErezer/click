# Click tracker

### Как поднять проект
1. Накатить миграции командой `php artisan migrate`
2. Сидировать базу данных командой `php artisan db:seed`
3. Поднять php server (`php artisan serve`)
4. Использовать два скрипта на странице клики которой ты хочешь отследить:

Подключение скрипта обработки кликов -
- `<script src="{{ asset('js/click/clickTracker.js') }}"></script>`

Подключение ключа скрипта с id вашего созданного сайта -
- `<script>startTracking(id-вашего сайта)</script>`
