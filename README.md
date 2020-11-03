## DEPRECATED! Please use following repos instead 
* [otis22/vetmanager-url](https://github.com/otis22/vetmanager-url)


# vetmanager-api

Library for work with Vetmanager REST API. 
Now url address has format $domain.vetmanager.ru for example: myclinic76.vetmanager.ru 
But this url format can changes in future. 

If you want stable application for Vetmanager REST API, please use this library

![GitHub CI](https://github.com/otis22/vetmanager-api/workflows/CI/badge.svg)

[![Run in Postman](https://run.pstmn.io/button.svg)](https://god.postman.co/run-collection/64d692ca1ea129218ccb)

# How to use 
## Install
```
composer require otis/vetmanager-api:@dev
```

## Basic usage Url

```
use function Otis22\VetmanagerApi\url;

echo url('myclinic') . "\n";
```

Where 'myclinic' is first part from your clinic url. $domain.vetmanager.ru

## Basic Usage Token

```
use function Otis22\VetmanagerApi\url;
use function Otis22\VetmanagerApi\credentials;
use function Otis22\VetmanagerApi\token;

$credentials = credentials('login', 'password', 'app_name');
$url = url('myclinic');
echo token($credentials, $url) . "\n";
```

Where:

* 'myclinic' - first part from your clinic url. $domain.vetmanager.ru
* 'login' - user login
* 'password' - user password
* 'app_name' - name application will use this token

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
