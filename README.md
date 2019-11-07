# MDR_Challenge

## Once you have completed this challenge upload your code onto github and send the link.

### Prerequisites 
**You will need composer, php, and a mysql installed on your local machine to complete this challenge**

### Set Up
1. Create a database named laravel in your mysql db.
2. Clone/Pull down this repository onto your local machine. 
3. Copy .env.example to .env
4. Update .env db configurations
5. Run `composer install` in the project directory.
6. Run `php artisan migrate` to create database tables.
7. You may need to run `composer dump-autoload` to regenerate composer's autoloader.
8. Run `php artisan db:seed` to populate the students and departments table.

# Challenge
### Create API routes that do the following
* Returns all students and departments
* Updates name of student or department by id
* Adds a students/departments to database
* Returns all students that belong to a department
* Returns the number of students that are majoring in each department sorted in descending number of students.
