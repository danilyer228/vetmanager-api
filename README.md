# vetmanager-api
For work with vetmanager api

![GitHub CI](https://github.com/otis22/vetmanager-api/workflows/CI/badge.svg)

# Contributing


## Run docker container
```
cd docker
docker-compose up
```

now you can connect to terminal

```
docker exec -it php-skelleton /bin/bash
```

## Run tests

```
#validate composer json
composer validate

#security check
vendor/bin/security-checker security:check

#check code style
vendor/bin/phpcs --ignore-annotations --standard=PSR12 src tests

#analyze code
vendor/bin/phpcf tests src && vendor/bin/phpstan analyse --level=max src tests

#run unit tests
vendor/bin/phpunit

#run coverage check(need run after phpunit)
vendor/bin/php-coverage-checker build/logs/clover.xml 100

#run all tests

composer validate && \
vendor/bin/security-checker security:check && \
vendor/bin/phpcs --ignore-annotations --standard=PSR12 src tests && \
vendor/bin/phpcf tests src && vendor/bin/phpstan analyse --level=max src tests && \
vendor/bin/phpunit && vendor/bin/php-coverage-checker build/logs/clover.xml 100
```
