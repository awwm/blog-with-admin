# blog-with-admin
Blog Website with Admin Portal

## Technologies Used

- PHP
- Docker
- MySQL (for database)
- HTML/CSS/JavaScript (for frontend)
- Composer (for dependency management)
- JWT (JSON Web Tokens) for authentication

## Prerequisites

Before running the application, ensure you have the following installed:

- Docker: [Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose: [Installation Guide](https://docs.docker.com/compose/install/)
- Composer: [Installation Guide](https://getcomposer.org/download/)

## Project Structure
├── docker-compose.yml            # Docker Compose file for managing containers\
├── Dockerfile                    # Dockerfile for building the PHP environment\
├── public/                       # Public directory for frontend files\
│   ├── index.html                # Homepage\
│   ├── post.html                 # Individual blog post page\
│   ├── admin_login.html          # Admin login page\
│   ├── admin_signup.html         # Admin signup page\
│   ├── password_reset.html       # Password reset page\
│   ├── css/                      # CSS stylesheets\
│   ├── js/                       # JavaScript files\
│   └── images/                   # Image assets\
├── src/                          # Backend source code\
│   ├── controllers/              # Controllers for handling requests\
│   │   ├── AuthController.php   # Controller for authentication\
│   │   ├── PostController.php   # Controller for managing blog posts\
│   │   └── UserController.php   # Controller for managing users\
│   ├── models/                   # Models for interacting with the database\
│   │   ├── User.php             # User model\
│   │   ├── Post.php             # Post model\
│   │   └── Comment.php          # Comment model\
│   ├── routes/                   # Routes for API endpoints\
│   │   ├── api.php              # API routes\
│   │   └── auth.php             # Authentication routes\
│   ├── config/                   # Configuration files\
│   │   └── Database.php         # Database configuration\
│   ├── core/                     # Core functionality\
│   │   ├── Autoloader.php       # Autoloader for class files\
│   │   └── jwt.php              # JWT token generation and verification\
│   └── index.php                 # Main entry point\
└── sql/                          # SQL files for database initialization\
    └── init.sql                  # SQL script for database initialization\