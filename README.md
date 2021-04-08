## Movies Seeder
seed movies data from https://www.themoviedb.org/

## Installation
* `cp .env.example to .env`

* set 
  `DB_HOST:db
  DB_HOST=db
  DB_DATABASE=movies
  DB_USERNAME=root
  DB_PASSWORD=root`
  
If you want to use redis as your queue driver
 * set `REDIS_HOST=redis`

* `composer install`
* `docker-compose build`
* `docker-compose up -d`

If you got the problem of file permission ,you should go enter the php image
`docker-compose exec php sh`
then type `chown -R www-data:www-data storage/`


* `php artisan migrate`


## Tools
* PHP7.4
* Laravel
* Mysql8
* Docker
* redis
* phpunit



## Testing
From PHP image 
* `docker-compose exec php sh`

run
```
vendor/phpunit/bin
```
## Commands
```
php artisan categories:fetch
```

```
php artisan movies:fetch
```


## APIs

http://localhost:8081/api/v1/movies




    

