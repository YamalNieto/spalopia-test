# Spalopia test

## Technologies

* PHP 8.2
* Symfony 5.4
* PostgreSQL
* PHPUnit
* Docker
* Make
* Caddy

## Pattern Development

* Domain Driven Design
* Hexagonal Architecture
* CQRS
* Repository Pattern
* Mother Pattern

## Getting Started

* Install `make` on you computer if you do not already have it.
* Install `docker` and `docker compose`.
* Copy the .env.example to .env `cp .env.example .env`

Within the Makefile you can handle the entire flow to get everything up and running:
```
⚠️ If it throws an error, change `docker compose` to `docker-compose` in the Makefile. 
It will depend on the version of docker compose you have installed.
```

* Execute `make build` to build the Docker image and start the application.
* Execute `make up` if you only want to start the application.
* Execute `make install` to install the dependencies.
* Execute `make migrations` to load migrations.
* Execute `make fixtures` to create the initial batch of spa services and time slots.

Go to `http://localhost:8080/api/health-check` to check if everything is ok.

## Endpoints
* GET: `http://localhost:8080/api/check-health`
* GET: `http://localhost:8080/api/spa-services`
* GET: `http://localhost:8080/api/spa-services/{id}`
* POST: `http://localhost:8080/api/reservations`

## Testing
* You can find all the tests in `tests` directory. They are distributed between Unit and Integration tests.
* All the tests that requires the database are saved in a test database.
* After every test executed, the migrations are restarted.
* Execute `make tests` to run all the tests.

## Closing application
* Execute `make down` to stop and remove all the containers.

## For the future
* More testing, I lacked of more time to test everything. The majority of tests are for the SpaServices and TimeSlots bounded contexts.
* Improve the relations between entities. I wanted to declare the relationship between them but I had some issues with the mapping.
* Add events to improve the code and the S from SOLID.
* Develop a feature to have spa services in more languages.
