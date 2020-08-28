FROM php:5.5.38-fpm

RUN apt-get update -y && apt-get install -y \
	git \
	libpng-dev \
	libjpeg62-turbo-dev \
	libfreetype6-dev \
	libjpeg-dev \
	libpng-dev

RUN docker-php-ext-configure gd \
  --with-png-dir=/usr/include/ \
  --with-jpeg-dir=/usr/include/ \
  --with-freetype-dir=/usr/include/freetype2/

RUN docker-php-ext-install gd zip mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer