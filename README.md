# Принцип работы
Файл excell с начало добавляется в базу данных, после кэшируется в redis и отображается из кэша.
Незаполненные поля отбрасываются.
И только после запуска очереди данные добавляются в redis.

# Установка
 1) Скопировать файл .env_examele под именем .env
 2) composer install
 3) ./vendor/bin/sail up
 4) $ artisan migrate:fresh --seed
    $ sail artisan storage:link
    $ sail artisan cache:clear
    $ sail artisan queue:work
 5) Потом скачиваем файл (ниже ссылка) и загружаем в приложение
    https://docs.google.com/document/d/1g07FLoKzvH-VwMCC_2A1vsGZurvDq0DrM8ptad9wt7c/edit



- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# task_parser
# task_parser
