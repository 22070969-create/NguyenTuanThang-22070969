CREATE DATABASE login_form CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
 
USE login_form;
 
CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    username VARCHAR(50) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL

);
 
INSERT INTO users (username, password)

VALUES ('admin', MD5('123456'));