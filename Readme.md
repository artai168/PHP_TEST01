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


Requirements 2
1) FAQ answer (SELECT TYPE, show Q&A) ✓
2) Login page with newsletter subscribe and subscribe ✓

------------------------------------------------------------
HOW TO INSTALL
1) unzip and all install it in the localhost/assignment/
2) index.php should be localed in localhost/assignment/

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
