# SHOP

Сервис Shop.
База данных PGSQL.
Код на чистом php. 

Рекомендуется запускать на ОС Ubuntu.

### Usage:
    git clone http://git.izi.cariot.ru/avazbek/shop && cd shop && cp .env.example .env
### Запуск всей инфраструктуры:
    sudo docker-compose up
### Остановка:
    sudo docker-compose down

### Всё поднимается на портах

```
хост        порт
shop_pgsql  6544
shop_php    8888
```
вне контейнера всё доступно по localhost и порту 8888

#### БД
```
src/pg-tables.sql  # сюда можно пихать структуры бд
src/pg-data.sql    # сюда можно пихать тестовые данные 
```

## Действия после запуска:

### Создания БД:
    sudo docker exec -it shop_php bash init.sh
### Постмен колекция для тестов находиться в корневом каталоге проекта.
    Shop.postman_collection.json