CREATE DATABASE loginDB;
USE loginDB;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO `users` (`username`, `password`) VALUES ('admin', 'r4nd0MP4ssWord');
create user 'crystal'@'localhost' IDENTIFIED BY 'password';
GRANT INSERT,SELECT ON loginDB.users TO 'crystal'@'localhost';

