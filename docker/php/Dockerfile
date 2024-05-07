FROM php:8.2-fpm-alpine

WORKDIR /app

RUN apk --update upgrade \
    && apk add --no-cache autoconf automake make gcc g++ git bash icu-dev libzip-dev linux-headers

RUN pecl install apcu-5.1.23 && pecl install xdebug-3.3.0

RUN docker-php-ext-install -j$(nproc) \
        bcmath \
        opcache \
        intl \
        zip \
        pdo_mysql

RUN docker-php-ext-enable apcu opcache

RUN apk add --no-cache --virtual .pgsql-deps postgresql-dev; \
	docker-php-ext-install -j$(nproc) pdo_pgsql; \
	apk add --no-cache --virtual .pgsql-rundeps so:libpq.so.5; \
	apk del .pgsql-deps

COPY docker/etc/php/ /usr/local/etc/php/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash -s - --install-dir /usr/local/bin

# allow non-root users have home
RUN mkdir -p /opt/home
RUN chmod 777 /opt/home
ENV HOME /opt/home
