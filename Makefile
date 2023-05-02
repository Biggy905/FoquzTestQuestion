init:
	docker network create foquz_network
up:
	docker-compose up -d
up-build:
	docker-compose up -d --force-recreate --build
down:
	docker-compose down
down-clear:
	docker-compose down -v --remove-orphans
composer-install:
	docker-compose run --rm foquz_php_cli composer install
migrate:
	docker-compose run --rm foquz_php_cli php ./yii migrate -- --interactive=0
fixtures:
	docker-compose run --rm foquz_php_cli php ./yii fixture/load "*"
test:
	docker-compose run --rm foquz_php_cli php /app/src/vendor/bin/codecept run ApiUnit
