FROM nginx:alpine

EXPOSE 8080
COPY ./docker-builds/nginx/streamtide.conf /etc/nginx/conf.d/default.conf
COPY src/ /var/www/html
