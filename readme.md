# Recipe Application:
This is a recipe application built using Laravel 9 and MySQL and Alpine.js. The application has a Docker Compose image that can be used to run the application.
# Features:
The application has the following features:
- Everyone can show recipes
- Search recipes by advanced features
- Login/Register account
- The application has 2 users: normal user and admin
- The normal user has the possibility to add recipe to favorite
- The admin can add, edit, delete recipes
- Get random recipe
# Installation:
To install the application, follow these steps:
Clone the repository
1. Install Docker and Docker Compose
2. Run docker-compose up -d to start the containers
3. Run docker-compose exec app php artisan migrate to run the database migrations
4. Run docker-compose exec app php artisan db:seed to seed the database with sample data
# Usage:
To use the application, open your web browser and go to http://localhost:8000. You should see the home page of the application. From there, you can browse recipes, search for recipes, and login/register for an account.
If you register for an account, you will be able to add recipes to your favorites. If you login as an admin, you will be able to add, edit, and delete recipes.