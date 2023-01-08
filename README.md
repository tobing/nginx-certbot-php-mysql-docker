# Nginx, Php-fpm and MySQL/PostgreSQL stack with Certbot from docker-compose.yml

This repository to create Nginx, Php-fpm and MySQL/PostgreSQL stack with Certbot from docker-compose.yml file.



> This repository is accompanied by a step-by-step guide on [Boilerplate for nginx with Let’s Encrypt on docker-compose](https://github.com/wmnnd/nginx-certbot).

```init-letsencrypt.sh``` fetches and ensures the renewal of a Let’s Encrypt certificate for one or multiple domains in a docker-compose setup with nginx. This is useful when you need to set up nginx as a reverse proxy for an application.

## Installation
1. Install docker-compose.

2. Clone this repository: ``` git clone https://github.com/tobing/nginx-certbot-php-mysql-docker.git```

3. Modify configuration:
- Add domains and email addresses to init-letsencrypt.sh
- Replace all occurrences of example.org with primary domain in ```/nginx/app.conf``` and ```/nginx.localhost/app.conf```
- Uncomment ```- ./nginx.localhost:/etc/nginx/conf.d``` and comment ```- ./nginx:/etc/nginx/conf.d``` in docker-compose.yml file. This setting to generate certificate for the first time
4. Run the init script: ```./init-letsencrypt.sh``` (set staging=1 for testing your setup to avoid Let's Encrypt request limits)

5. Comment ```- ./nginx.localhost:/etc/nginx/conf.d``` and uncomment ```- ./nginx:/etc/nginx/conf.d``` in docker-compose.yml file.
 
6. Run the server: ```docker-compose up```

## PHP
PHP image including composer and these addional modules so need some time to compile. You can customize them from ```/php/Dockerfile```
- curl
- gd
- intl
- opcache
- pdo
- pdo_mysql
- pdo_pgsql
- pgsql
- zip

## Stack
- nginx:1.23-alpine
- certbot/certbot
- php:8-fpm-alpine
- mysql:8

You can customize the versions from ```docker-compose.yml``` and ```/php/Dockerfile```
