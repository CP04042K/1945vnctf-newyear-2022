# docker build -t pyhp . && docker run -d -p 8084:80 pyhp
FROM ubuntu:latest

RUN ln -snf /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime && echo "Asia/Ho_Chi_Minh" > /etc/timezone
RUN apt update -y && apt install -y php7.4 apache2 libapache2-mod-php7.4
RUN rm -rf /var/www/html/*
COPY index.php /var/www/html/
COPY secret.txt /var/www/html/secret/
RUN mkdir /var/www/html/files && chmod 777 -R /var/www/html/files && chown www-data:www-data /var/www/html/files

WORKDIR /var/www/html/

EXPOSE 80

CMD ["/usr/sbin/apachectl", "-DFOREGROUND"]