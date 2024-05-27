FROM php:8.0-apache

# Установка необходимых PHP расширений
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Копируем файлы проекта в директорию Apache
COPY ./index.php /var/www/html/
COPY ./src /var/www/html/src

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

ADD ./docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Активируем модуль Apache mod_rewrite
RUN a2enmod rewrite
