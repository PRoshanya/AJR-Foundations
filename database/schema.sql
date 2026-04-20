CREATE DATABASE IF NOT EXISTS ajr-foundations;

USE ajr-foundations;

DROP TABLE IF EXISTS users;

CREATE TABLE newusers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    f_name VARCHAR(50) NOT NULL,
    l_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(10) NOT NULL,
    dob DATE,
    province VARCHAR(50),
    district VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
