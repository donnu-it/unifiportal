FROM php:5.6-apache
MAINTAINER ivan@donnu.edu.ua

COPY apache/apache2.conf /etc/apache2

RUN a2enmod rewrite
# install the PHP extensions we need
RUN apt-get update && apt-get install -y php5-cli libpng12-dev git libjpeg-dev libpq-dev memcached php5-memcached mc \
	&& rm -rf /var/lib/apt/lists/* \
#	&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
	&& docker-php-ext-install gd mbstring zip

RUN \
        curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=1.0.0-alpha11


#WORKDIR /var/www/html
COPY src/ /var/www/html

RUN cd /var/www/html && \
composer install

#RUN ln /var/www/html/settings/settings.php /var/www/html/application/settings/config.php \
#    && ln /var/www/html/settings/simplesamlphp/config.php /var/www/html/simplesamlphp/config/config.php \
#    && ln /var/www/html/settings/simplesamlphp/saml20-idp-remote.php /var/www/html/simplesamlphp/metadata/saml20-idp-remote.php \
#    && ln /var/www/html/settings/simplesamlphp/cert/web1.key /var/www/html/simplesamlphp/cert/web1.key \
#    && ln /var/www/html/settings/simplesamlphp/cert/web1.pem /var/www/html/simplesamlphp/cert/web1.pem

VOLUME /var/www/html/settings

COPY apache/templates/ /templates
COPY docker-entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]
