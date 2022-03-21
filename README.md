# Laravel blog api
## Api для постов с хештегами

## Запуск

Для удобства в корне лежит docker-compose.yml с контейнером psql
.env.example актуальный
Подправить .env

```sh
composer install
npm install
docker-composer up -d
php artisan migrate:fresh --seed
php artisan serve
```

## Auth Endpoints
| Action | URL |
| ------ | ------ |
| Login User | [GET] api/auth/login |
| Logout User | [GET] api/auth/logout |
| Create User | [POST] api/auth/register |
| Current User | [GET] api/auth/user |

## Post Endpoints

| Action | URL |
| ------ | ------ |
| All Posts | [GET] api/posts |
| Create Post | [POST] api/posts |
| Show Post | [GET] api/posts/{id} |
| Update Post | [PUT,PATCH] api/posts/{id} |
| Delete Post | [DELETE] api/posts/{id} |

