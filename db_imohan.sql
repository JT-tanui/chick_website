CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    profilePicture VARCHAR(255),
    password VARCHAR(255) NOT NULL
);
