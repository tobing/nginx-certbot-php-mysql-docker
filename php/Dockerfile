FROM php:8-fpm-alpine
LABEL Maintainer="Tobing <lumban.tobing.m@gmail.com>" \
	
RUN apk update && apk add curl && \
  curl -sS https://getcomposer.org/installer | php \
  && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

RUN apk --no-cache add --virtual .build-deps $PHPIZE_DEPS \
  && apk --no-cache add --virtual .ext-deps icu-dev libmcrypt-dev freetype-dev \
  libjpeg-turbo-dev libpng-dev libxpm-dev libwebp-dev libxml2-dev msmtp bash openssl-dev libpq-dev libzip-dev pkgconfig \
  && docker-php-source extract \
  && docker-php-ext-configure intl \
  && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
  && docker-php-ext-install gd intl pdo pdo_mysql mysqli pgsql pdo_pgsql zip opcache \
  && docker-php-ext-enable opcache \
  && docker-php-source delete \
  && apk del .build-deps