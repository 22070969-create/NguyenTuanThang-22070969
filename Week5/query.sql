CREATE DATABASE login_demo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


USE login_demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
users

INSERT INTO users (username, password)
VALUES ('admin', MD5('123456'));

-- 5️⃣ Thêm cột mssv, dob, country
ALTER TABLE users
ADD COLUMN mssv VARCHAR(20) AFTER password,
ADD COLUMN dob DATE AFTER mssv,
ADD COLUMN country VARCHAR(100) AFTER dob;


UPDATE users
SET mssv = 'SV001',
    dob = '2000-01-01',
    country = 'Vietnam'
WHERE username = 'admin';


INSERT INTO users (username, password, mssv, dob, country)
VALUES 
('user1', MD5('password1'), 'SV002', '2001-05-10', 'Vietnam'),
('user2', MD5('password2'), 'SV003', '2002-08-21', 'USA'),
('user3', MD5('password3'), 'SV004', '1999-12-30', 'Japan');