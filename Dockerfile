FROM centos:centos7
RUN yum install -y epel* && \ 
    yum install -y \
        php-cli \
	php-fpm \
	nginx \
	curl \
	supervisor

RUN rm -Rf /etc/nginx/nginx.conf
ADD nginx.conf /etc/nginx/nginx.conf
RUN rm -Rf /usr/share/nginx/html/*
ADD app.conf /etc/nginx/conf.d/app.conf
ADD supervisord.conf /etc/supervisord.conf
ADD main.php /usr/share/nginx/html/main.php
ADD index.html /usr/share/nginx/html/index.html
ADD jquery.min.js /usr/share/nginx/html/jquery.min.js
EXPOSE 8000
CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]
