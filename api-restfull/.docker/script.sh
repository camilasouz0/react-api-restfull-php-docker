#!/bin/bash

set -e

until mysql -h"$DB_HOST" -u"$DB_ROOT_USER" -p"$DB_ROOT_PASSWORD" -e 'SELECT 1'; do
  >&2 echo "MySQL está inacessível - aguardando..."
  sleep 1
done

mysql -h"$DB_HOST" -u"$DB_ROOT_USER" -p"$DB_ROOT_PASSWORD" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"
mysql -h"$DB_HOST" -u"$DB_ROOT_USER" -p"$DB_ROOT_PASSWORD" -e "GRANT ALL ON $DB_NAME.* TO '$DB_USER'@'$DB_HOST' IDENTIFIED BY '$DB_PASSWORD';"

echo "Banco de dados inicializado com sucesso!"
