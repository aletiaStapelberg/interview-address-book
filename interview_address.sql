CREATE DATABASE interview;

USE interview;

CREATE TABLE contacts(  
  id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO contacts (first_name,surname) VALUES ('contact','one'),('contact','two'),('contact','three'),('contact','four');

CREATE TABLE contacts_info(  
  id INT NOT NULL AUTO_INCREMENT,
  contacts_id INT NOT NULL,
  contact_number VARCHAR(11) DEFAULT '',
  email_address VARCHAR(100) DEFAULT '',
  PRIMARY KEY (id)
);

INSERT INTO contacts_info (contacts_id,contact_number,email_address) VALUES ('1','0820010001','one11@interview.com'),('1','0820020001','one1@interview.com'),('1','0830040002','one2@interview.com'),('2','0830020002','blaps@interview.com'),('2','0830030002','blah@test.com'),('3','0840030003','three@interview.com'),('3','0840040003','three3@interview.com'),('4','0850040004','four@interview.com'),('4','0850040004','four@interview.com'),('4','0850040004','four@interview.com');