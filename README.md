# WIP CakeNotify Application

***This application is in early stage of development, and it's not intended for production use for now***

This is simple notification application. It will send SMS via Twilio gateway when state of application is changed or state is different from default application state (the later is plaed feature). You will need
create account on twilio to using this app.

This application is made with CakePHP

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

To run this application you will need to have installed [Docker](https://docs.docker.com/get-docker/) and running Traefik for SSL and proxying request to application. Docker compose configuration contains

* application image based on PHP-FPM
* Nginx
* Posgtres 12.4
* Redis

First you need to build application

```bash
docker-compose build
```

and run it

```bash
docker-compose up -d
```

Application on start runs migrations automatically. Next you will need to create your user. Its not possible to creat it over web interface for now. You can add your user with cakephp console:

```bash
docker-compose run --rm cakenotify-app php bin/cake.php add_user -u your@email -p paSSw0rd
```

After this you can log in. Go to your user details for api_token. You will need it to change application status trough api.

Next important thing is to add Twilio SMS configuration. You can get details on your Twilio account details.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Create new user

```bash
docker-compose -f dev-docker.yml run --rm cakephp php bin/cake.php add_user -u user@email.tld -p yourPassword
```

* `-u`: use email as username

## Change status for application

```bash
curl -i --data state=1 -H "__token__:<change-to-your-token>" https://<change-to-server-address>/api/v1/applications/create-log/<application-id>.json
```

You will obtain your token from your user details.

## Changin status code from bash script

```bash
#!/bin/bash
SERVER_URL="<your-server-url>"
APP_ID="1"
AUTH_TOKEN="<your-auth-token>"

#  ... your commands here

statuscode=$?
curl -i --data state=${statuscode} -H "__token__:${AUTH_TOKEN}" https://${SERVER_URL}/api/v1/applications/create-log/${APP_ID}.json 
```

## Run development server

You will need to install docker / Docker desktop server to develop this application. Development dokcer contains custom app image for development [maymeow/php-ci-cd](https://github.com/MayMeow/php-ci-cd), 
postgres server and redis server.

```bash
docker-compose -f dev-docker.yml up -d
```

installing composer packages

```bash
docker-compose -f dev-docker.yml run --rm cakephp composer install
```

acccess to cake console

```bash
docker-compose -f dev-docker.yml run --rm cakephp php bin/cake.php
```
