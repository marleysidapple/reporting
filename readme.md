1. Steps to run the project and initialize the database
a. Firstly, unzip the project folder and you will see Source folder.
b. navigate into the Source folder from command line or terminal and run following commands.
   i.  composer install  (this will fetch all the related dependencie)
   ii. php artisan key:generate (this will generate app key)
c. inside Source folder there is .env.example file. Rename that file to .env and edit the database credential parameters  for production database and testing database. For e.g

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_production_database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

DB_DATABASE_TEST=your_test_database_name

d. Go into phpmyadmin and create the production and test databases respectively. 
e. Now, from inside the Source folder, run following command in terminal
  i.  php artisan config:cache
  ii. php artisan config:clear
  iii.php artisan migrate
  iv. php artisan db:seed
  v.  php artisan migrate --database=testing
  vi. php artisan db:seed --database=testing

f. Once this process gets completed, our application is ready to use. From inside the Source folder, run this command.
   i. php artisan serve
   This will serve our application using random port (For e.g localhost:8000).
   Alternatively, we can access our application from inside htdocs as well.

g. Once you access application, you will get a login screen. Please use following credential to login.
    Email: operator@mail.com
    Password: password

h. In order to run unit test, from inside the Source folder, run this command in terminal.
   phpunit


2. Assumptions
  a. Operator is not provided with the delete facility. 
  b. Once the patient is created, login credentials will be mailed to his/her email.
  c. Report will be mailed in the form of attachment as an pdf to the patient if he/she wish to mail it. 


3. Minimum Requirement
 a. php version greater than 5.5.9
 b. composer
 c. phpunit


4. Feedback
  a. it would be more easier and better to send passcode in email rather than text message because free sms api is not easily available.



