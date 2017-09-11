all: install front_install

install:
	docker-compose up --no-deps -d php-fpm database

	docker exec -ti sandstone-php sh -c "composer install"

	docker exec -ti sandstone-database sh -c "mysql -u root -proot -e 'create database if not exists sandstone;'"
	docker exec -ti sandstone-php sh -c "bin/console orm:generate-entities src/"
	docker exec -ti sandstone-php sh -c "bin/console orm:schema-tool:update --dump-sql"
	docker exec -ti sandstone-php sh -c "bin/console orm:schema-tool:update --force"

	docker-compose up -d

update:
	docker-compose up --build --force-recreate --no-deps -d php-fpm database

	docker exec -ti sandstone-php sh -c "composer update"

	docker exec -ti sandstone-database sh -c "mysql -u root -proot -e 'create database if not exists sandstone;'"
	docker exec -ti sandstone-php sh -c "bin/console orm:schema-tool:update --dump-sql"
	docker exec -ti sandstone-php sh -c "bin/console orm:schema-tool:update --force"

	docker-compose up --build --force-recreate -d

logs:
	docker-compose logs -ft

optimize_autoloader:
	docker exec -ti sandstone-php sh -c "composer install --optimize-autoloader"

bash:
	docker exec -ti sandstone-php bash

restart_websocket_server:
	docker restart sandstone-ws

front_bash:
	docker-compose up -d nodejs
	docker exec -ti poker-planning-nodejs /bin/sh

front_install:
	docker-compose up -d nodejs
	docker exec -ti poker-planning-nodejs sh -c "npm install"
