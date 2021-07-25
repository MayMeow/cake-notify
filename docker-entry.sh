#!/bin/bash

echo "Wait until $DB_HOST on port 5432 is ready"
until nc -z $DB_HOST 5432
do
    sleep 1
done

sleep 1

echo "Runing migrations"

php bin/cake.php migrations migrate
sleep 1

echo "Clear cache"

php bin/cake.php cache clear_all

echo "Starting server"
php-fpm
