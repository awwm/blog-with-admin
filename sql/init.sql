CREATE DATABASE IF NOT EXISTS blog;
USE blog;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'editor') DEFAULT 'editor',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    featured_image VARCHAR(255),
    author INT NOT NULL,
    status VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    author VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- Add admin user
INSERT INTO users (username, password, role) VALUES ('admin', 'admin@admin.com', '$2a$12$AOfkrEr2tY4okOxyWXF8F.dEb3pnhCiuzPJRdOwef5ha/f3gGX4SG', 'admin');
-- password for testing is adminpassword

-- Add dummy posts
INSERT INTO posts (title, content, author, status) VALUES 
('First Post', 'This is the content of the first post.', 1, 'published'),
('Second Post', 'This is the content of the second post.', 1, 'published'),
('Third Post', 'This is the content of the third post.', 1, 'published'),
('Fourth Post', 'This is the content of the fourth post.', 1, 'published');