#!/bin/bash

export PGPASSWORD=pass

cd src

# mkdir -p /app/src/vendor
# chmod 777 /app/src
# chmod 777 /app/src/vendor
# su www-data -s /bin/bash -c '/bin/composer install --no-cache --ignore-platform-reqs'
# /bin/composer install --no-cache --ignore-platform-reqs
pg_dump -h postgres -U user -d click -f pg-tables.sql


# psql -h postgres -U user -w -d click -f pg-tables.sql
# psql -h postgres -U user -w -d click -f pg-data.sql

# php ./test.php
# php ./init.php
