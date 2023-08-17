# iNiLabs Assignment

All the tasks of the assignment done and pushed in this repository.

## Task Run guide
1. My used environment / tools 
    - Windows 
    - Xampp
    - PHP 8.2.0
    - node v18.14.1
    - MySQL database
2. How to get the codes 
   - clone the repository inside the htdocs folder of xampp
   - start "Apache server" & "MySQL database" from xampp control panel
   - Type "localhost" on browser and open specific task folder to run it (except task 5).  

### Task 1 -  Class Inheritance

This is a simple task. Just run as it as like as said up on number 2 and you will see the output.  


### Task 2 -  Interface Implementation
Do before run this task
  - Create database named "logs_data" on phpmyadmin
  - Import the given sql file , you will find inside task-2 folder
  - Run the code 
  - You will find output on database 
  - One log file will create on same folder  

### Task 3 and 4 - Encapsulation & Polymorphism
Just simply run the file , you will see output. 

### Task 5 - To-Do Module (laravel and vue)

#### used technologies
  - laravel 10
  - bootstrap 4
  - vue 3 (composition api)
  - vite , vuex , axios

go to "task-5 to-do module" folder and run the below commands
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```
Then change DB_DATABASE = todo_app and create a database on phpmyadmin. Database name todo_app
Then run the more some commands
```bash
php artisan migrate
npm run dev
php artisan serve
```

Finally , type  "localhost:8000" on browser and you will see the output. 
