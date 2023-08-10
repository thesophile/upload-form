[demo video](demo.mkv)

# mysql commands:

CREATE TABLE uploaded_data (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     name VARCHAR(100) NOT NULL,
    ->     subject VARCHAR(100) NOT NULL,
    ->     description TEXT NOT NULL,
    ->     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -> );

 CREATE TABLE users (
    ->     id INT AUTO_INCREMENT PRIMARY KEY,
    ->     username VARCHAR(50) NOT NULL,
    ->     password VARCHAR(255) NOT NULL
    -> );

# authentication

username: root

password: abhinav

database name: new_database
