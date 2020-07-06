# vetmanager-api
Library for work with Vetmanager REST API. 
Now url address has format $domain.vetmanager.ru for example: myclinic76.vetmanager.ru 
But this url format can changes in future. 

If you want stable application for Vetmanager REST API, please use this library

![GitHub CI](https://github.com/otis22/vetmanager-api/workflows/CI/badge.svg)

# How to use 
## Install
```
composer require otis/vetmanager-api:@dev
```

## Basic usage

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
composer check-composer

#static analyzes and codestyle 
composer static

#run unit tests
composer unit-tests

#run all tests

composer all-tests
```
