FROM php:7.0

RUN mkdir -p /var/www/html/

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

EXPOSE 80

CMD [ "-t", "/var/www/html/", "-S", "0.0.0.0:80" ]
