docker_network=admin_app_network
app=app

install:
	# cp .env.example .env
	#
	docker network inspect $(docker_network) > /dev/null 2>&1 || \
	docker network create -d bridge $(docker_network)
	docker-compose up --build

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
	docker-compose exec $(app) php artisan migrate:refresh --seed

tinker:
	docker-compose exec $(app) php artisan tinker
