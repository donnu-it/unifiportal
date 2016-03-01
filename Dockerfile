FROM php:5.6-apache
MAINTAINER ivan@donnu.edu.ua

WORKDIR /var/www/html
COPY . /var/www/html

RUN \
		curl -sS https://getcomposer.org/installer | php && \
		mv composer.phar /usr/local/bin/composer && \
		ln -s /usr/local/bin/composer /usr/bin/composer && \
		echo "deb http://httpredir.debian.org/debian jessie main contrib" >> /etc/apt/sources.list && \
		apt-get update && \
		apt-get install git -y && \
		cd /var/www/html &&\
		composer install