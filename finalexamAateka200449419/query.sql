CREATE DATABASE Aatekabanu200447029;
USE Aatekabanu200447029;
CREATE TABLE `book_club_member` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar (100) NOT NULL,

  `profile_image` varchar(200) NOT NULL,
  `short_book_review` varchar(300) NOT NULL,


  PRIMARY KEY (user_id)
);

CREATE TABLE `clubperson` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar (255) NOT NULL,
  PRIMARY KEY (ID)
);
