CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';



USE appDB;

CREATE TABLE IF NOT EXISTS accounts(
	acc_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	username VARCHAR(50) NOT NULL,
  	passwords VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL
);


INSERT INTO accounts (username, passwords, email) VALUES ('admin', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user1', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user2', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user3', 'admin', 'test@test.com');

DROP TABLE IF EXISTS mesto;
CREATE TABLE IF NOT EXISTS mesto(
	mesto_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	mesto_user VARCHAR(100) NOT NULL,
  	mesto_img VARCHAR(100)
);

INSERT INTO mesto (mesto_user, mesto_img) VALUES ('admin', "/src/images/1.jpg");

INSERT INTO mesto (mesto_user, mesto_img) VALUES ('test_user1', "/src/images/2.jpg");

INSERT INTO mesto (mesto_user, mesto_img) VALUES ('test_user2', "/src/images/3.jpg");