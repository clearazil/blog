FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN apt-get update -y && apt-get install -y libonig-dev libmcrypt-dev openssl git curl zip unzip cron

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Cron job for Laravel scheduler:

# Copy laravel-scheduler file to the cron.d directory
COPY --chown=$user:$user cron/laravel-scheduler /etc/cron.d/laravel-scheduler

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/laravel-scheduler

# Apply cron job
RUN crontab /etc/cron.d/laravel-scheduler

# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Run the command on container startup
CMD cron && tail -f /var/log/cron.log

RUN mkdir /app
WORKDIR /app
USER $user

# Make sure composer creates .bat files for windows users
RUN composer config -g bin-compat full

# Copy extra ini config
COPY ini/conf.d/conf_dev.ini /usr/local/etc/php/conf.d/conf_dev.ini


