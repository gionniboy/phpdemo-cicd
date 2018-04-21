-- db/user bootstrap
CREATE DATABASE IF NOT EXISTS testdb DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER IF NOT EXISTS 'testuser'@'localhost'  IDENTIFIED BY 'testpass' ;
GRANT ALL PRIVILEGES ON testdb.* TO 'testuser'@'localhost';
FLUSH PRIVILEGES;
