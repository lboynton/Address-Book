-- creates the database tables

DROP TABLE IF EXISTS address_books;

CREATE TABLE address_books
(
    id serial NOT NULL PRIMARY KEY,
    name character varying(255) NOT NULL
);

DROP TABLE IF EXISTS contacts;

CREATE TABLE contacts
(
    id serial NOT NULL PRIMARY KEY,
    address_book_id bigint NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    address_1 character varying(255),
    address_2 character varying(255),
    county character varying(255),
    country character varying(255),
    post_code character varying(10),
    home_tel character varying(100),
    work_tel character varying(100),
    mobile_tel character varying(100),
    fax character varying(100),
    email character varying(255)
);