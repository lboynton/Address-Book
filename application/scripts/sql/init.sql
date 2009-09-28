-- creates user and database

CREATE USER 'addressbook'@'localhost' IDENTIFIED BY 'addressbook';
CREATE DATABASE addressbook;
GRANT ALL ON addressbook.* TO 'addressbook'@'localhost';