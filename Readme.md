------------------------------------------------------------
This Website is using the basic concept of Model, View, Controller


--> ini/_default.ini.php
Contains the basic database table and field names and the basic setting files of the file path file

Program Initial
When the system start, it will check with the datbase system if the database exit, if not exit, it will create the database and tables by
--> ini/setip.php
--> ini/_sys.ini.sql

------------------------------------------------------------

Requirements 1
1) User login page  ✓
    --> Success ✓
    --> Fail, count for 3times ✓
2) User registration ✓
3) FAQ answer (SELECT TYPE, show Q&A) ✓
4) Login page with newsletter subscribe and subscribe ✓

------------------------------------------------------------
HOW TO INSTALL
1) Unzip and all install it in the localhost/assignment/
2) Index.php should be localed in localhost/assignment/
3) Run the website by xampp server and turn on the Web Server and MySQL database
4) Open the webpage by any browser in the website: http://127.0.0.1/assignment  or http://localhost/assignment
5) The database will setup automaically in the first setup
6) System Login user name: aaa   password: bbb

------------------------------------------------------------
IDEA FOR THE STRUCTURE

index.php (setup database if not yet have database)
        --> --> View/AppStart.php   (login) 
                ---> Forms/login.php
                    ----> Controllers/Login_Controoler.php --> Models/User.php
                           (Success) -----> View/MainPage.php
                           (Fail) -----> View/ERROR_FailLogin.php  
                           (Fail) -----> View/ERROR_User_NotExit.php       
                           (Fail) -----> View/ERROR_NoMoreLogin.php     (over 3 times fail)
         --> --> View/Register.php   (login) 
                ---> Forms/registration.php
                    ----> Controllers/Registration_Controller.php --> Models/User.php
                           (Success) -----> View/MainPage.php (?)
                           (Fail) -----> View/ERROR_USER_EXISTS.php  

            --> newsletter.php (Select subscribe or unsubscribe after login)
            --> FAQ pages (Select different of FAQ after login)
