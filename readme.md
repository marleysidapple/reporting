1. Steps tro create and initialize the database
   a. First create a new mysql database in phpmyadmin.
   b. In project source, rename .env.example to .env and edit DB_DATABASE, DB_USER AND DB_PASSWORD parameters with created database name, username and password.
   c. Navigate to the project source and from inside the source, run below commands. 
   d. run "php artisan config:cache" and "php artisan config:clear".
   d. run "php artisan migrate" from commannd line.
   e. run "php artisan db:seed" from command line


2. Step to run the project
  a. go inside the project source and run command "composer install"
  b. you can either place the project inside the htdocs folder and run accordingly like (http://localhost/{projectname}/public).
  c. OR, from inside the source folder, run "php artisan serve" command in command line and it will start application is something like http://localhost:8000.
  d. login parameters are:
    email: operator@mail.com
    password: password
  e. For running unit testing, specify the testing database parameters in .env file. Edit the following parameters (DB_DATABASE_TEST, DB_USERNAME_TEST, DB_PASSWORD_TEST).
  f. then run following command 'php artisan migrate --database=testing', 'php artisan db:seed --database=testing'. and finally run phpunit to run unit test.


3. Minimum pre-requisities 
   a. Composer
   b. php version greater than 5.5.9


4. Assumptions.
  a. Operator is not provided with the delete facility. 
  b. Once the patient is created, login credentials will be mailed to his/her email.
  c. Report will be mailed in the form of attachment as an pdf to the patient if he/she wish to mail it. 


5. Feedbacks
  a. it would be better to send passcode in email rather than text message.


