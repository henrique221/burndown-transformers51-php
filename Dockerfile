FROM php:7.0

RUN mkdir -p /var/www/html/

COPY . /var/www/html/

EXPOSE 80

CMD [ "-t", "/var/www/html/", "-S", "0.0.0.0:80" ]