CREATE DATABASE IF NOT EXISTS student_db;
USE student_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    roll_no VARCHAR(20)
);
