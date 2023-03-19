# VERROM

VERROM is a web app to manage and track your book collection. See what others are reading and exchange your books with them!

## Table of Contents

* [Technologies](#technologies)
* [Documentation](#documentation)
* [Database](#database)

## Technologies
Technologies used in the project:
* HTML 5
* CSS
* PHP (version 7.4.3 or newer)
* JavaScript
* PostgreSQL

## Documentation

### public/css
* booklist.css -- styling the books page
* cart.css -- styling the cart page
* contacts.css -- styling the contact page
* login.css -- styling the login page
* main.css -- styling the main page
* profile.css -- styling the profile

### public/img
Contains logos and default images used by the site.

### public/views
* booklist.php -- shows available books and allows buy and select them
* cart.php -- displays all books in the cart
* login.php -- allows the user to sign in and sign up
* contacts.html -- displays contacts info
* footer.php -- footer content for mobile app
* header.php -- header content
* main.php -- main page content
* profile.php -- profile content

### public/src/controllers
* AppController.php -- base controller class, inherited by all other controllers
* BookController.php -- books controller
* CartController.php -- cart controller
* ContactsController.php -- contacts controller
* LoginController.php -- login controller
* MainController.php -- main page controller
* ProfileController.php -- profile controller

### public/src/models
* Book.php -- provides methods and fields necessary for handling Book objects
* Author.php -- provides methods and fields necessary for handling Author objects
* Account.php -- provides methods and fields necessary for handling Account objects
* AccountBook.php -- provides methods and fields necessary for handling AccountBook objects

### public/src/repository
* Repository.php -- base Repository class, inherited by the other repository classes
* AccountRepository.php -- controls operations on account in the database
* AccountBookRepository.php -- controls join operations on account and book in the database
* BookRepository.php -- controls operations on books in the database
* CartRepository.php -- controls operations on cart and order in the database

### Database.php
Contains the script used to connect to the database server.

### Routing.php
Contains app routing for GET, POST and RUN functions, includes all Controllers.

### docker-compose.yml
Docker configuration file.

### index.php
Responsible for parsing urls into GET and RUN functions, handled by chosen Controllers.

## Database
Database used by the app has been exported into the script.sql file available in the main directory of the repository.