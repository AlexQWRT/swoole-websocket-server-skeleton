
help:
	@echo "Available commands:"
	@echo " - install"
	@echo " - install-env"
	@echo " - install-php-xdebug-ini"
	@echo " - install-docker-php-ws"
	@echo " - install-php-composer-packages"
	@echo " - clean"
	@echo " - start"
	@echo " - stop"
	@echo " - terminal"

install: install-env \
	install-docker-override \
	install-php-xdebug-ini \
	install-docker-php-ws \
	install-php-composer-packages \
	start

install-env:
	cp -n ./docker/.env.example ./docker/.env
	cp -n ./app/.env.example ./app/.env

install-docker-override:
	cp -n ./docker/compose.override.yml.example ./docker/compose.override.yml

install-php-xdebug-ini:
	cp -n ./docker/php/assets/xdebug.ini.example ./docker/php/assets/xdebug.ini
	sed -i "s/XDEBUG_CLIENT_HOST/$(shell hostname -I | cut -d" " -f1)/" ./docker/php/assets/xdebug.ini

install-docker-php-ws:
	cd docker && \
	docker compose build --build-arg HOST_UID=$(shell id -u) php-ws && \
	docker compose up -d php-ws

install-php-composer-packages:
	cd docker && docker compose run --rm -T php-ws composer install

clean:
	cd docker && docker compose down -v
	git clean -fdx -e .idea

start:
	cd docker && docker compose up -d

stop:
	cd docker && docker compose down

terminal:
	cd docker && docker compose exec -it php-ws bash

