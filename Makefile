init: docker-clear docker-pull docker-build docker-up
restart: docker-down docker-up
deploy: docker-build docker-push docker-pull docker-up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans


docker-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

docker-push:
	docker-compose push


composer-install:
	docker-compose run --rm php-cli composer install


phpfpm:
	docker exec -it taskmanagement_php-fpm_1 bash
