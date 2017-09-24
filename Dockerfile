FROM httpd
WORKDIR /var/www/html
ADD . /var/www/html
RUN yum update
RUN yum install php-fpm
RUN yum install mysqli