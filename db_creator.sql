--run this code incase you never created the db before into any SGBD such as phpmyadmin or mysql Workbench..idk

CREATE DATABASE IF NOT EXIST hackathon
USE hackathon




CREATE TABLE 'users' (
  'id' int(11) NOT NULL PRIMARY KEY UNIQUE KEY AUTO_INCREMENT,
  'username' varchar(100) NOT NULL,
  'password' varchar(100) NOT NULL
)
