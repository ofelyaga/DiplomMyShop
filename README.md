// install project

- php artisan shop:install
  внутри данной команды хранятся
- php artisan storage:link
- php artisan migrate

// install debug bar
composer require barryvdh/laravel-debugbar --dev
composer require laravel/telescope
php artisan telescope:install
php artisan migrate
// объяснения
RateLimit - инструмент
нужен для

- ограничения трафика, например, для попыток на вход(10 раз в минуту),
- ограничить количество запросов либо к роуту либо внутренней операции,
- отправка емайла с восстановлением пароли,
- под копотом работа с кэшом, по умолчанию сохраняется кэш в файлах(дата начала инкремент счётчика), если счётчик не
  срабатывает всё даём 405 ошибку

.env
окружение, настройка окружения, почему сидит в gitignore, в гит не добавляется
убъёте настройки если передать в гит, файл динамический, настройки меняются в зависимости от окружения

tailwind
content - что будем компилировать тут ресурсы
theme

- тут есть сетка screens
- размеры
- шрифты
- цвета
- плагины -есть по типографии, по формам итд

если все зависимости уже есть в composer

- composer install

настройка phpstorm
найти файл - shift X2
the north

// для создания команды для открытия проекта
php artisan make:command InstalCommand

// для создания провайдера для расширения vite
php artisan make:provider ViewServiceProvider

// создание анономных компонентов

php artisan make:component Forms/TextInput --view
php artisan make:component Forms/PrimaryButton --view

// инициализация файла tailwind (если поменять данные в кофиг.тайлвинд)
npx tailwindcss -i resources/css/app.css -o resources/css/output.css --watch

// для каждого роута создаём контроллер
php artisan make:controller HomeController
[]
//создание пользователя
php artisan tinker
User::create(["name"=> "Ofelya","email"=>"of4ok@mail.ru","password"=>bcrypt("123456")]);



