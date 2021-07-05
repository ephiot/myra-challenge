## Myra Challenge PHP  (myra-challenge)

This is the RESTfull API to accompish the Myra Challenge. The SPA that consumes this API was implemented as Laravel Blade, so just access http://localhost.

## Run the docker container from the project dir

```bash
./vendor/bin/sail up -d
```

## Setting database

The database is already set on docker-compose, but if the migration/seeder not run on 'docker-compose up', just execute the command bellow:

```bash
docker-compose exec laravel.test php artisan migrate --seed
```

## Tests

To run the tests execute the command bellow:

```bash
docker-compose exec laravel.test ./vendor/bin/phpunit --testdox
```
