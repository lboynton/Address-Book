#!/bin/sh
echo Creating tables...

mysql -u addressbook -paddressbook addressbook < sql/schema.sql

echo Finished!
