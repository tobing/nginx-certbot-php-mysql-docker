# Nginx, Php-fpm and MySQL/PostgreSQL stack with Certbot from Docker compose


> This repository is accompanied by a step-by-step guide on [Boilerplate for nginx with Let’s Encrypt on docker-compose](https://github.com/wmnnd/nginx-certbot).


This repo to create Nginx, Php-fpm and MySQL/PostgreSQL stack with Certbot from docker-compose.yml file.

```init-letsencrypt.sh``` fetches and ensures the renewal of a Let’s Encrypt certificate for one or multiple domains in a docker-compose setup with nginx. This is useful when you need to set up nginx as a reverse proxy for an application.

## Installation
1. Install docker-compose.

2. Clone this repository: ``` git clone https://github.com/tobing/nginx-certbot-php-mysql-docker.git```

3. Modify configuration:
- Add domains and email addresses to init-letsencrypt.sh
- Replace all occurrences of example.org with primary domain in ```/nginx/app.conf``` and ```/nginx.localhost/app.conf```
- Uncomment ```- ./nginx.localhost:/etc/nginx/conf.d``` and comment ```- ./nginx:/etc/nginx/conf.d``` in docker-compose.yml file. This setting to generate certificate for the first time
4. Run the init script: ```./init-letsencrypt.sh```

5. Comment ```- ./nginx.localhost:/etc/nginx/conf.d``` and uncomment ```- ./nginx:/etc/nginx/conf.d``` in docker-compose.yml file.
 
6. Run the server: ```docker-compose up```
