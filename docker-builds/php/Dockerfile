FROM trafex/php-nginx:latest
COPY --chown=nginx:nginx ./src /var/www/html
COPY --chown=nginx:nginx ./docker-builds/php/fastcgi.conf /etc/nginx/fastcgi.conf
COPY --chown=nginx:nginx ./docker-builds/php/nginx.conf /etc/nginx/nginx.conf
VOLUME [ "/var/www/html" ]
