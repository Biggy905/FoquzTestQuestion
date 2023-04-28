FROM php:8.1-cli-alpine

RUN apk add --update linux-headers

# Install dependencies
RUN apk add --no-cache --update\
      autoconf g++ make \
      postgresql-dev \
      freetype \
      libjpeg-turbo \
      libpng \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
      oniguruma-dev \
    && docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      # --with-png=/usr/include/ \ # No longer necessary as of 7.4; https://github.com/docker-library/php/pull/910#issuecomment-559383597
      --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && apk del --no-cache \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev

RUN apk add libzip-dev

RUN docker-php-ext-install pdo pgsql pdo_pgsql pcntl zip bcmath mbstring

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN apk add --no-cache ${PHPIZE_DEPS} imagemagick imagemagick-dev

RUN pecl install -o -f imagick\
    &&  docker-php-ext-enable imagick

RUN apk del --no-cache ${PHPIZE_DEPS}


#RUN apk add --no-cache imagemagick imagemagick-dev

#RUN pecl install -o -f imagick\
#    &&  docker-php-ext-enable imagick

# Copy configs
COPY ./docker/php/config /usr/local/etc/php/conf.d

# NodeJS
RUN apk add --update bash supervisor npm

RUN npm install -g npm

RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories

RUN apk --no-cache add shadow && usermod -u 1000 www-data

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set default directory
WORKDIR /app/src
