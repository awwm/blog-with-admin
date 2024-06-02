# Project Overview
The Blog Website with Admin Portal project provides a full-featured blogging platform with an administrative interface, comprising the following components:

**Frontend:**
- Built using HTML, CSS, and JavaScript.
- Styled with Tailwind CSS for a modern, responsive design.
- Uses Toastify-js for stylish notifications.
- Interacts with the backend via JavaScript's Fetch API for asynchronous data operations.

**Admin Panel:**
- Developed with PHP.
- Styled using Bootstrap for a consistent and professional UI.
- Uses cURL to communicate with the backend API service, allowing administrators to manage blog content efficiently.

**API Service:**
- Backend engine built with PHP.
- Handles CRUD (Create, Read, Update, Delete) operations.
- Provides secure and efficient data manipulation and retrieval.

**Database:**
- Managed with MySQL.
- Stores all necessary data for the blog, ensuring data integrity and supporting complex queries.

**Docker:**
- Used for containerization to simplify deployment and ensure consistency across environments.
- Docker Compose manages multi-container applications, orchestrating the frontend, admin panel, API service, and database.

## Key Technologies
- Frontend: HTML, CSS, JavaScript, Tailwind CSS, Toastify-js, Fetch API.
- Admin Panel: PHP, Bootstrap, cURL.
- API Service: PHP, RESTful architecture, security mechanisms.
- Database: MySQL.
- Docker: Containerization, Docker Compose.

## Prerequisites
Before running the application, ensure you have the following installed:
- Docker: [Installation Guide](https://docs.docker.com/get-docker/)
- Docker Compose: [Installation Guide](https://docs.docker.com/compose/install/)
- Composer: [Installation Guide](https://getcomposer.org/download/)


## Installation
1. Clone the Repository: `https://github.com/awwm/blog-with-admin`
2. Run dockers
3. Access project root folder and then run command ```docker-compose up --build -d```
    - It will install dependendcies and build the project services containers and then we can access all services
    - Access to [admin-panel](https://github.com/awwm/blog-with-admin/tree/main/admin-panel) and [api](https://github.com/awwm/blog-with-admin/tree/main/api) folders and run command ``` composer install ``` this  will install project based dependencies
    - [PHPMyAdmin](http:localhost:8083) we can use the file under [sql/init.sql](https://github.com/awwm/blog-with-admin/tree/main/sql) for creating db and tables 
    - [Frontend](http:localhost:8080) It may run without dockers because i used only html/css/js not any dependecy or server side but for accessing api and admin-panel we must need to run dockers or any other service such as wampp or xampp
    - [Admin Panel](http:localhost:8081) at http://localhost:8081/index.php?page=signup we can signup as an admin or editor
        - Under [Admin Panel](http:localhost:8081) folder make sure we have ```/uploads/``` folder for processing and saving blog's featured image
    - [API Service](http://localhost:8082) an API service designed to manage CRUD (Create, Read, Update, Delete) operations for our application. This service acts as a backend engine that handles data manipulation and retrieval efficiently and securely.

## Why I Used Different Technologies:
I made sure to use a mix of technologies in this project to show I'm skilled in a variety of areas and to meet different job needs. Even though I could have just used Node.js for the API services, I chose PHP because the job seems to focus more on PHP skills. For the website's look and feel, I used HTML, CSS, and JavaScript, along with Tailwind CSS and Toastify-js to make things look nice and work smoothly. For the admin part, I went with PHP to show I'm good at server-side coding, adding Bootstrap to make it look professional and cURL to talk to the server efficiently. Docker was used to simplify deployment and ensure consistency across different setups, making it easier to manage the project's different parts. This way, I'm showing I can handle different tasks and adapt to what's needed for the job.

