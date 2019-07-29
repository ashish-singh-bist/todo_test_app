
# # Todo Test App

 This Application is built in Laravel (version- 5.6). It basically contain a view, a controller (api controller), a model and a vue component.

# System Requirement
1) PHP Web Server (Apache2)
2) PHP (7.2 and above)
3) Laravel Framework (5.6 and above)
4) MySQL (5.6 and above)
5) Nodejs (3.5.2)


# Set up Project

#### Clone Application

Open your command line or terminal and enter the directory where you would like to  copy the repository and type the following command
`git https://github.com/ashish-singh-bist/todo_test_app.git`

This will create a directory name 'todo_test_app'
Navigate into the directory through the terminal (command prompt).

After cloning the application you need to install the required packages to run the application. For that you need to run the following command.
`composer install` for laravel packages and 
`npm install` for node packages for vuejs
`npm run prod` to publish vuejs files
This will install all the required packages for application.

check the laravel version install on your system, type the command
`php artisan --version`

Now you need to set Laravel config file "env" in the root folder of your application.
copy the .env.example file from root folder of the application and save it as .env
Set database credentials in .env file which you want to use

The next thing you need to do is to set up the application key for your application.
you have to type the following command in the terminal,
`php artisan key:generate`

This will create the application key.

## Set up Database

Create a database "todo_test_app"
Now run the following command to create table in db.
```php artisan migrate```
This will create all necessary tables in database.

# Files
1) Controller
 TaskController.php
2) View
 index.blade.php
3) vuejs component
 TaskComponent.vue


## Run App

You need to type the following command on the terminal to start the server

`php artisan serve`

Now open 'http://localhost:8000' in the browser.      

You will see Todo Test App page in front. The following task you can perform:-
 - Create task
 - Update task
 - Delete task
