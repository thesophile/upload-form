CREATE DATABASE new_database;

CREATE USER 'root'@'localhost' IDENTIFIED BY 'abhinav';

GRANT ALL PRIVILEGES ON new_database.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

USE new_database

CREATE TABLE uploaded_data (
         id INT AUTO_INCREMENT PRIMARY KEY,
         name VARCHAR(100) NOT NULL,
         subject VARCHAR(100) NOT NULL,
         description TEXT NOT NULL,
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );

 CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(50) NOT NULL,
         password VARCHAR(255) NOT NULL
     );