-- empty tables first
truncate address_books;
truncate contacts;

-- insert some test data
INSERT INTO address_books (name) VALUES ('Home'),('Work');
INSERT INTO contacts VALUES
(1,1,'Bob','Bobbington','1 Bob Road',NULL,'Bobtown','Bobcounty','Bobland','PO12UP','01234 567890','09876 543210',NULL,NULL,'bob@bobmail.com'),
(2,1,'John','Jones','22 New Road',NULL,'Portsmouth','Hampshire','United Kingdom','PO1 2UP','56548456651','01234567','65423123135484','6856465446645','johnjones@email.com'),
(3,2,'Renee','Costa','88 East Green Clarendon Boulevard',NULL,'Fort Worth','CA','Guernsey','34453','32323232','4334234234','432324432432','323434342',NULL),
(4,1,'Bridget','James','927 Green Fabien Avenue',NULL,'Cincinnati','ND','United States','88874','43234204320','43432423423','324432342432','3424332342','bridget.james@address.com'),
(5,1,'Cecil','Burke','66 New Road',NULL,'Lubbock','ID','Cyprus','433443','3443245','234355435','34432342324','232323',NULL),
(6,1,'Alberto','Oliver','599 West Cowley Street',NULL,'Santa Ana','AZ','Western Sahara','43434','34433243443','3423432432','3243434324','323434432234432',NULL),
(7,2,'David','Ford','10 Some Road',NULL,'Some town','ID','Cyprus','433443','3443245','234355435','34432342324','232323',NULL),
(8,1,'Audra','Bennett','19 White Old Street',NULL,'Denver','ID','Cyprus','433443','3443245','234355435','34432342324','232323',NULL),
(9,2,'Timothy','Zamora','175 Green Fabien Avenue',NULL,'Chicago','ID','Cyprus','433443','3443245','234355435','34432342324','232323',NULL),
(10,2,'Lloyd','Day','22 First Parkway',NULL,'Salt Lake City','ID','Cyprus','433443','3443245','234355435','34432342324','232323',NULL),
(11,1,'Toby','Jackson','364 East Nobel Street',NULL,'Chicago','ID','Cyprus','433443','3443245','234355435','34432342324','232323','toby.jackson@gmail.com');