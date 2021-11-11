docker_network=admin_app_network
app=app

install:
	composer install
	cp .env.example .env
	cp .env.testing.example .env.testing
	php artisan key:generate
	touch database/database.sqlite
	docker network inspect $(docker_network) > /dev/null 2>&1 || \
	docker network create -d bridge $(docker_network)
	docker-compose up --build

migrate-seed:
	docker-compose exec $(app) php artisan migrate --seed
	docker-compose exec $(app) php artisan passport:install


start:
	docker-compose up

stop:
	docker-compose stop

build:
	docker-compose up --build

migrate:
	docker-compose exec $(app) php artisan migrate --step

migrate-rollback:
	docker-compose exec $(app) php artisan migrate:rollback

db-seed:
	docker-compose exec $(app) php artisan db:seed

migrate-refresh:
	docker-compose exec $(app) php artisan migrate:refresh
	docker-compose exec $(app) php artisan passport:install

migrate-refresh-seed:
	docker-compose exec $(app) php artisan migrate:refresh --seed
	docker-compose exec $(app) php artisan passport:install

tinker:
	docker-compose exec $(app) php artisan tinker

test:
	docker-compose exec $(app) ./vendor/bin/phpunit

queue:
	docker-compose exec $(app) php artisan queue:work
