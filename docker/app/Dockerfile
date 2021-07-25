FROM php:7.4.16-fpm-buster

# arguments in docker-compose file
ARG user
ARG uid

# Install NodeJS and NPM
RUN curl -sSL https://deb.nodesource.com/setup_12.x | bash \
    && apt-get update \
    && apt-get install --fix-missing -y nodejs unzip libicu-dev libpq-dev zlib1g-dev libpng-dev libzip-dev netcat

# Install PHP Extensions
RUN docker-php-ext-install intl pdo_pgsql gd zip pdo_mysql

# PHP Pecl Redis extensions
RUN pecl install redis
RUN docker-php-ext-enable redis

# Install Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt update \
    && apt -y install yarn

# Install wget
RUN apt update \
    && apt install -y wget

# Composer install
RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Clean
RUN apt autoremove --purge \
    && apt clean

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY . /var/www

RUN chown -R $user:$user /var/www

# Set working directory
WORKDIR /var/www

RUN mv docker-entry.sh /usr/local/bin/docker-entry

RUN composer install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --optimize-autoloader #--no-scripts

RUN chmod -R 777 /var/www/logs

USER $user
