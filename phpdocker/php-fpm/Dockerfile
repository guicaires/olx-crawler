FROM phpdockerio/php74-fpm:latest
WORKDIR "/var/www/olx-crawler"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php7.4-bz2 \ 
        php7.4-ssh2 \ 
        php7.4-xdebug \ 
        php7.4-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN cd /var/www/olx-crawler \
    composer install \
    php artisan key:generate \
    cp .env.example .env \
    chown -R $USER:www-data storage \
    chown $USER:www-data .env \
    php artisan serve \