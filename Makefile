init:
	docker network create r_network
up:
	docker-compose up -d
down:
	docker-compose down
down-clear:
	docker-compose down -v --remove-orphans
composer-install:
	docker-compose run --rm r_php_cli composer install
migrate:
	docker-compose run --rm r_php_cli php ./yii migrate -- --interactive=0
fixtures:
	docker-compose run --rm r_php_cli php ./yii fixtures -- --interactive=0
