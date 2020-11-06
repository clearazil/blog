Creating a Blog for an assignment

Used docker to containerize the application

You can run `php artisan` commands inside docker like this: `docker-compose exec php_blog php artisan`

Do the following to get started
* Run `docker-compose up -d` to build, create, start, and attach the docker containers.
* Run `docker-compose exec php_blog composer install` to install all composer packages
* Create a new .env file and copy the contents of .env.example into it
* Run `docker-compose exec php_blog php artisan key:generate` to set the Laravel application key
* Run `docker-compose exec php_blog php artisan migrate:fresh --seed` to reset and seed the database
* Run the following commands, using barryvdh/laravel-ide-helper to create helper files for IDE autocompletion:
    * `php artisan ide-helper:generate`
    * `php artisan ide-helper:meta`
    * `php artisan ide-helper:models --nowrite`
