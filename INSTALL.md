# Установка и запуск проекта MKKNebus

Этот проект использует **Laravel**, **Docker**, **Swagger** и автоматическую настройку окружения через `entrypoint.sh`.

---

## ⚙️ Требования

- [Docker](https://www.docker.com/) — версия 20.x и выше  
- [Docker Compose](https://docs.docker.com/compose/) — версия 1.29 и выше  
- Поддерживаемые ОС:
  - Linux
  - macOS
  - Windows с WSL2

---

## 📦 Установка и запуск

### 1. Клонирование репозитория

```bash
git clone https://github.com/AlexeyEremin/mkknebus.git
cd mkknebus
```

### 2. Запуск проекта

```bash
docker compose up -d --build
```

В процессе:

- если отсутствует `.env`, создаётся копия из `.env.example`
- выполняется `composer install`
- генерируется `APP_KEY`
- выполняются миграции и сидеры (`php artisan migrate --seed`)

---

## 🗃 Структура проекта

- `docker/entrypoint.sh` — автоматизация установки, ключа и миграций
- `app/` — код Laravel
- `database/seeders/` — сидеры для тестовых данных
- `config/l5-swagger.php` — конфигурация Swagger UI
- `public/` — точка входа в приложение

---

## 🧪 Проверка запуска

Перейди в браузере:

```
http://localhost:8080
```

Если порт в `docker-compose.yml` другой, используй его:

```
http://localhost:<ваш_порт>
```

---

## 🔐 Авторизация

Все запросы к API защищены Bearer Token. Пример заголовка:

```
Authorization: Bearer <your_token>
```

---

## 📚 Swagger API-документация

Документация доступна по адресу:

```
http://localhost:8080/api/documentation
```

Если документация не отображается:

```bash
php artisan l5-swagger:generate
```

---

## 🛠 Полезные команды

### Composer внутри контейнера

```bash
docker compose exec app composer install
```

### Artisan: миграции и сидеры

```bash
docker compose exec app php artisan migrate --seed
```

### Сброс базы и сидеры

```bash
docker compose exec app php artisan migrate:fresh --seed
```

---

## ⚠️ Возможные проблемы

### Порт 3306 занят

**Ошибка:**

```
Ports are not available: exposing port 3306
```

**Решение:**

- Остановить локальный MySQL: `sudo service mysql stop`
- Или изменить порт MySQL в `docker-compose.yml`

---

### Ошибка прав доступа к `entrypoint.sh`

**Ошибка:**

```
permission denied: ./entrypoint.sh
```

**Решение:**

```bash
chmod +x docker/entrypoint.sh
```

---

## 🧹 Очистка проекта

Остановить и удалить все контейнеры:

```bash
docker compose down -v
```

Удалить всё (включая кэш, тома и образы):

```bash
docker system prune -a
```

---

## ✅ Готово!

После запуска ты получишь:

- Laravel-приложение с готовой базой
- Демонстрационные данные
- Swagger-документацию
- Поддержку Bearer-токенов
- Автоматизированный старт
