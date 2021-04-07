## Movies Seeder
seed movies data from https://www.themoviedb.org/

## Installation

* `cp .env.example to .env`

set DB_HOST:db

* `docker-compose build`
* `docker-compose up -d`

If you got the problem of file permission ,you should go enter the php image
`docker-compose exec php sh`
then type `chown -R www-data:www-data storage/`

* `php artisan migrate`


## Tools
* PHP7.4
* Laravel
* Mysql
* Docker


## Testing
```
docker-compose exec php vendor/phpunit/bin
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




    

