# Общее описание API проекта

Необходимо реализовать систему принятия и обработки заявок пользователей с сайта. Любой пользователь может отправить данные по публичному API, реализованному нами, оставив заявку с каким-то текстом. Затем заявка рассматривается ответственным лицом и ей устанавливается статус "Завершено". Чтобы установить этот статус, ответственное лицо должно оставить комментарий. Пользователь должен получить свой ответ по email. При этом, ответственное лицо должно иметь возможность получить список заявок, отфильтровать их по статусу и по дате, а также иметь возможность ответить задающему вопрос через email.

### Заявка

- id: Уникальный идентификатор
- name: Имя пользователя - строка, обязательная
- email: Email пользователя - строка, обязательная
- status: Статус - enum("Active", "Resolved")
- message: Сообщение пользователя - текст, обязательный
- comment: Ответ ответственного лица - текст, обязательный, если статус Resolved
- created_at: Время создания заявки - timestamp или datetime
- updated_at: Время ответа на заявку
- 
### Пользователь (User)

- id: Уникальный идентификатор
- name: Имя пользователя - строка
- email: Email пользователя - строка, уникальное значение
- email_verified_at: Дата и время подтверждения email (nullable)
- password: Пароль пользователя - строка
- remember_token: Токен 
- created_at: Время создания записи - timestamp или datetime
- updated_at: Время обновления записи - timestamp или datetime

## Endpointы API

Методы API должны быть документированы каким-нибудь средством документации на ваш выбор. Предпочтительно, с наличием песочницы.

- GET /requests/ - получение заявок ответственным лицом, с фильтрацией по статусу
- PUT /requests/{id}/ - ответ на конкретную задачу ответственным лицом
- POST /requests/ - отправка заявки пользователями системы

## Установка и запуск

1. Клонируйте проект:

    ```bash
    git clone https://github.com/IgoriLLa-lab/api-div-example.git
    ```

2. Запустите Docker Compose:

    ```bash
    docker-compose up -d
    ```

3. После успешного запуска контейнеров доступны следующие ресурсы:

    - div_nginx — веб-сервер
    - app_div_project — http://localhost:8002/
    - div_db — база данных
    - div_mail — сервер тестирования отправки email (mailpit) http://localhost:8025/

4. Войдите в контейнер с приложением:

    ```bash
    docker exec -it app_div_project sh
    ```

5. Установите зависимости через Composer:

    ```bash
    composer install
    ```

6. Сгенерируйте ключ приложения:

    ```bash
    php artisan key:generate
    ```

7. Настройте `.env` файл на основе `env.example`.

8. Выполните миграции для базы данных:

    ```bash
    php artisan migrate
    ```
   
9. http://localhost:8002/register регистрируем пользователя 1 раз и это будет admin

10. http://localhost:8002/dashboard получаем токе который используей в Postman коллекции

## Используемые технологии

- Docker Compose
- PHP 8.2
- Nginx
- Laravel 11
- MySQL 8.0
- [Mailpit](https://github.com/axllent/mailpit) для проверки отправки email
- Postman (для тестирования API)
