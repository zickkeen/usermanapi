# MiUse (Mikrotik Userman) API Gateway

Useful MiUse API Gate for RESTful API Mikrotik Userman Development, using [Mikrotik Userman API Gateway](https://www.github.com/bojezcreative/usermanapi).

Used technologies: `PHP 7, Slim 4, MySQL, PHPUnit, dotenv, Docker & Docker Compose`.

[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://travis-ci.com/bojezcreative/usermanapi.svg?branch=master)](https://travis-ci.com/bojezcreative/usermanapi)
[![Coverage Status](https://coveralls.io/repos/github/bojezcreative/usermanapi/badge.svg?branch=master)](https://coveralls.io/github/bojezcreative/usermanapi?branch=master)
[![Packagist Version](https://img.shields.io/packagist/v/bojezcreative/usermanapi)](https://packagist.org/packages/bojezcreative/usermanapi)

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat


## :gear: QUICK INSTALL:

### Requirements:

- Composer.
- PHP 7.4+ or 8.0+.
- MySQL/MariaDB.
- or Docker.


### With Composer:

You can create a new project running the following commands:

```bash
$ composer create-project bojezcreative/usermanapi [my-api-name]
$ cd [my-api-name]
$ composer test
$ composer start
```


#### Configure your connection to MySQL Server:

By default, the API use a MySQL Database.

You should check and edit this configuration in your `.env` file:

```
DB_HOST='127.0.0.1'
DB_NAME='yourMySqlDatabase'
DB_USER='yourMySqlUsername'
DB_PASS='yourMySqlPassword'
DB_PORT='3306'

ROS_HOST='192.168.1.xx'
ROS_USER='user'
ROS_PASS='pass'
ROS_PORT='8728'
```


### With Docker:

If you like Docker, you can use this project with **docker** and **docker-compose**.


**Minimal Docker Version:**

* Engine: 18.03+
* Compose: 1.21+


**Docker Commands:**

```bash
# Create and start containers for the API.
$ docker-compose up -d --build

# Checkout the API.
$ curl http://localhost:8081

# Stop and remove containers.
$ docker-compose down
```


## :package: DEPENDENCIES:

### LIST OF REQUIRE DEPENDENCIES:

- [slim/slim](https://github.com/slimphp/Slim): Slim is a PHP micro framework that helps you quickly write simple yet powerful web applications and APIs.
- [slim/psr7](https://github.com/slimphp/Slim-Psr7): PSR-7 implementation for use with Slim 4.
- [pimple/pimple](https://github.com/silexphp/Pimple): A small PHP dependency injection container.
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv): Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.

### LIST OF DEVELOPMENT DEPENDENCIES:

- [phpunit/phpunit](https://github.com/sebastianbergmann/phpunit): The PHP Unit Testing framework.
- [symfony/console](https://github.com/symfony/console): The Console component eases the creation of beautiful and testable command line interfaces.
- [nunomaduro/phpinsights](https://github.com/nunomaduro/phpinsights): Instant PHP quality checks from your console.
- [maurobonfietti/slim4-api-skeleton-crud-generator](https://github.com/maurobonfietti/slim4-api-skeleton-crud-generator): CRUD Generator for Slim 4 - Api Skeleton.


## :bookmark: ENDPOINTS:

### BY DEFAULT:

- Hello: `GET /`
- Health Check: `GET /status`
- Get User List from RouterOs: `GET /user/list`
- Import User from RoS to DB: `GET /user/import`
- Show User list from DB: `GET /user/show`

## :video_camera: TUTORIAL:

[Develop a RESTful API with PHP and Slim 4.](https://youtu.be/DetK1w65S-k) [:movie_camera: :sound: :es: :argentina:]


## :heart: WOULD YOU LIKE TO SUPPORT THIS PROJECT?

You can support this project inviting me a coffee :coffee: :yum: or giving a **star** to this repo :star: :blush:.

* [![Paypal](https://img.shields.io/badge/Paypal-zickkeen-blue)](paypal.me/donateZickkeen)
* [![Buy Me a coffee](https://img.shields.io/badge/BuyMeCofee-zickkeen-yellow)](buymeacoff.ee/zickkeen)
* [![SociaBuzz](https://img.shields.io/badge/SociaBuzz-zickkeen-green)](https://sociabuzz.com/zickkeen/tribe)
* [![BitCoin](https://img.shields.io/badge/btc-18xbSr5kmvxzpHEpJ43LAbXqdZ1XcmKQNf-green)](https://www.blockchain.com/btc/address/18xbSr5kmvxzpHEpJ43LAbXqdZ1XcmKQNf)
* [![BitCoin](https://img.shields.io/liberapay/gives/zickkeen?logo=zickkeen&style=social)](https://liberapay.com/zickkeen)
* [![DogeCoin](https://img.shields.io/badge/DLHMhGRe8cCdJAypdt512e6PA6N2H5rNHy-yellow)](https://dogechain.info/address/DLHMhGRe8cCdJAypdt512e6PA6N2H5rNHy)

## :sunglasses: THAT'S IT!

Now go build a cool RESTful API.
