FROM nginx:1.21-alpine

ARG ROOT_DIR_PATH=.

COPY ${ROOT_DIR_PATH}/conf/app.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www

EXPOSE 80
