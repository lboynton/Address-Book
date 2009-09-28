-- empty tables first
truncate address_books;
truncate contacts;

-- insert some test data
INSERT INTO address_books (name) VALUES ('Home'),('Work');
INSERT INTO contacts VALUES (1,1,'Bob','Bobbington','1 Bob Road','','Bobtown','Bobland','PO12UP','01234 567890','09876 543210',NULL,NULL,'bob@bobmail.com');