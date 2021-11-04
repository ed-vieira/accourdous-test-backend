docker_network=admin_app_network

install:
	# cp .env.example .env
	#
	docker network inspect $(docker_network) > /dev/null 2>&1 || \
	docker network create -d bridge $(docker_network)
	docker-compose up --build

init:
	docker-compose up

build:
	docker-compose up --build
