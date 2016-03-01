FROM php:5.6-apache
MAINTAINER ivan@donnu.edu.ua

RUN a2enmod rewrite
# install the PHP extensions we need
RUN apt-get update && apt-get install -y php5-cli libpng12-dev git libjpeg-dev libpq-dev \
	&& rm -rf /var/lib/apt/lists/*
#	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
#	&& docker-php-ext-install gd mbstring zip


RUN \
        curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/html
COPY . /var/www/html

RUN cd /var/www/html && \
composer install