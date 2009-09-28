#!/bin/sh
echo Setting up database, please enter MySQL root password when prompted...

mysql -u root -p < sql/init.sql

echo Finished!