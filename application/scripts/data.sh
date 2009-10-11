#!/bin/sh
echo Inserting test data...

mysql -u addressbook -paddressbook addressbook < sql/data.sql

echo Finished!
