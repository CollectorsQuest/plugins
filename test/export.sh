#!/bin/bash

./symfony propel:insert-sql --env=test --no-confirmation
./symfony propel:data-load --env=test test/fixtures/common

for table in `mysql -ubookstore -pqTdzNVrKeZK5BwAr bookstore -e 'show tables' | egrep -v 'Tables_in_' `; do
  mysqldump -ubookstore -pqTdzNVrKeZK5BwAr --insert-ignore --skip-set-charset -c -C --compact --opt -Q bookstore $table > test/schemas/$table.sql
done
