run:
	php index.php game:run

docker:
	docker run --rm -v $(pwd):/app -w /app php:7.2-cli php index.php game:run


# development command
format:
	./vendor/bin/cbf --standard=PSR2 src tests

composer-check:
	composer validate --no-check-all --strict

cs:
	./vendor/bin/phpcs --standard=PSR2 src tests

stan:
	./vendor/bin/phpstan analyse src tests --level max

test:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

check: composer-check cs stan test
