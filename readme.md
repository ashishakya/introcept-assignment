# IntroCept Task-Assessment

Assessment Detail: https://github.com/IntroCept/Task-Assessments/blob/master/Full%20Stack%20PHP%20Javascript%20Task.md

Site URL: http://introcept-assignment.ashishakya.com.np

## Prerequisite
- PHP >=7.4
- Node >=12
- Composer 1

## Initial setup:
- Clone the repo using `git clone https://github.com/ashishakya/introcept-assignment.git` command.
- Open the directory containing the project. 
- Run `cp .env.example .env` command.
- Run `composer install` command.
- Run `npm install or yarn` command.
- Run `php artisan key:generate` command.

## Things to remember (For developer):
- Code must be written as per PSR-2 coding standards. CI using Styleci is integrated in the repo. 

### To run the test case:
- Run `php artisan test` command. Currently, the test case checks the existence of the API and checks if the POST request validates the data properly. 

### Deployment
Deployment is automated using Capistrano.

- Deployment Code: `cap <env> deploy branch=<branch>`



## Project Structure
```
-- app
   |-- Constants
       |-- ContactModes.php
       |-- Genders.php
       |-- General.php      
   |-- Helpers
       |-- routes.php
   |-- Http
       |-- Controllers
           |-- Api
               |-- Employee
                   |-- EmployeeController
               |-- BaseApiController.php 
   |-- Providers
       |-- HelperServiceProvider.php
       |-- RepositoriesServiceProvider.php
       
 -- resources
    |-- js
       |-- Classes
            |-- Errors.js
            |-- Form.js
       |-- components
           |-- Common
               |-- ErrorMessage.vue
           |-- Employee
               |-- EmployeeCreate.vue
               |-- EmployeeDetail.vue
               |-- EmployeeList.vue
        |-- mixins
            |-- routeMixin.vue
            
 -- tests
    |-- Feature
        |-- EmployeeTest.php 
```
    
