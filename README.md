# vetmanager-api
Library for work with Vetmanager REST API. 
Now url address has format $domain.vetmanager.ru for example: myclinic76.vetmanager.ru 
But this url format can changes in future. 

If you want stable application for Vetmanager REST API, please use this library

![GitHub CI](https://github.com/otis22/vetmanager-api/workflows/CI/badge.svg)

#How to use 
## Install
```
composer require otis/vetmanager-api:@dev
```

##Basic usage

```
use function Otis22\VetmanagerApi\url;

echo url('myclinic') . "\n";
```

# Contributing


## Run docker container
```
cd docker
docker-compose up
```

now you can connect to terminal

```
docker exec -it vetmanager-api /bin/bash
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
