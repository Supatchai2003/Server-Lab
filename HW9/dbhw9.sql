CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password1 VARCHAR(255) NOT NULL,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    gender ENUM('Male', 'Female', 'Other'),
    age INT,
    province VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    role1 ENUM('Admin', 'Customer') DEFAULT 'Customer'
);

INSERT INTO users (username, password1, firstname, lastname, gender, age, province, email, role1) 
VALUES ('admin', '1234', 'Admin', 'User', 'Male', 21, 'Bangkok', 'admin@example.com', 'Admin');