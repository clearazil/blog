Creating a Blog for an assignment

Used docker to containerize the application

You can run `php artisan` commands inside docker like this: `docker-compose exec php_blog php artisan`

Do the following to get started
* Run `docker-compose up -d` to build, create, start, and attach the docker containers.
* Run `docker-compose exec php_blog /bin/bash` to start using the bash shell inside the container
* Run `composer install` to install all composer packages
* Create a new .env file and copy the contents of .env.example into it
* Run `php artisan key:generate` to set the Laravel application key
* Run `php artisan migrate:fresh --seed` to reset and seed the database
* Run the following commands, using barryvdh/laravel-ide-helper to create helper files for IDE autocompletion:
    * `php artisan ide-helper:generate`
    * `php artisan ide-helper:meta`
    * `php artisan ide-helper:models --nowrite`
* Run `php artisan storage:link` to create the symlinks specified in config/filesystems.php

If the config for a docker image has been changed, the image needs to be rebuilt for docker to use the new config:
* First, stop the running docker containers with `docker-compose down`
* Run `docker image ls` to get a list of images
* Remove the image, for example 'blog_php_blog': `docker image rm blog_php_blog`
* Run `docker-compose up -d` and docker will automatically rebuild the missing image
