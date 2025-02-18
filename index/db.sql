CREATE DATABASE rooteme;
USE rooteme;

CREATE TABLE challenges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    challenge_name VARCHAR(255),
    points INT,
    category VARCHAR(255),
    level VARCHAR(255),
    author VARCHAR(255),
    link VARCHAR(255),
    publication_date DATETIME,
    challenge_statement TEXT,
    tool_name VARCHAR(255),
    hint_description TEXT
);

ALTER TABLE challenges MODIFY publication_date DATETIME DEFAULT CURRENT_TIMESTAMP;



