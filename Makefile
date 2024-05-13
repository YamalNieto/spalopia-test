MAKEFLAGS += --no-print-directory
USER = $(shell id -u):$(shell id -g)

PHP_CONTAINER := "spalopia_test_php"

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
.PHONY: help

build: ## Builds development stack
	uid=${shell id -u} gid=${shell id -g} docker compose build
	@make up
.PHONY: build

rebuild: ## Rebuilds all the stack creating all from zero
	uid=${shell id -u} gid=${shell id -g} docker compose build --pull --force-rm --no-cache
	@make up
	@make dependencies
.PHONY: rebuild

up: ## Starts development stack
	uid=${shell id -u} gid=${shell id -g} docker compose up -d
.PHONY: up

down: ## Stops development stack
	@docker compose down
.PHONY: down

install: ## Install all needed dependencies
	docker exec -it -u${USER} ${PHP_CONTAINER} sh -c "\
		composer install --prefer-dist --no-progress --no-scripts --no-interaction --optimize-autoloader 	&& \
		composer dump-autoload --classmap-authoritative 													;"
.PHONY: dependencies

bash:
	@docker exec -it -u${USER} ${PHP_CONTAINER} sh

tests: ## Executes tests
	uid=${shell id -u} gid=${shell id -g} docker exec ${PHP_CONTAINER} php bin/phpunit
.PHONY: tests

.PHONY: migrations
migrations: ## Execute pending doctrine migrations
	@docker exec -it -u${USER} ${PHP_CONTAINER} php bin/console doctrine:migrations:migrate												;
