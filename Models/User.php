<?php

        require_once '../ini/_default.ini.php';

        if (!isset($_SESSION))
        {
            session_start();
        }
        
        /* 
        `User_Name` VARCHAR(10) NOT NULL,
        `Password` VARCHAR(20) NOT NULL,
        `Full_Name` VARCHAR(60) NOT NULL,
        `Email_Address` VARCHAR(100) NOT NULL,
        `Date_Of_Birth` DATE,
        `Post_Address` TEXT,
        `Post_Code` VARCHAR(10) NOT NULL,
        `Account_Status` INT NOT NULL,
        `Continue_Fail_Count` INT DEFAULT 0,
        `Date_Of_Create` datetime DEFAULT CURRENT_TIMESTAMP,
        */

    class User
    {        
        public $_User_Name;
        public $_Pasword;
        public $_Full_Name;
        public $_Email_Address;
        public $_Date_Of_Birth;
        public $_Post_Address;
        public $_Post_Code;
        public $_Account_Status;
        public $_Continue_Fail_Count;
        public $_News_Subscription;
        public $_D_Of_Create;        
    }


    // Setup Data Table and data fields
    class User_Table extends User
    {
        public $Table;
        function __construct()
        {
            $this->Table = "User";
            $this->_User_Name = "User_Name";
            $this->_Pasword = "Password";
            $this->_Full_Name = "Full_Name";
            $this->_Email_Address = "Email_Address";
            $this->_Date_Of_Birth = "Date_Of_Birth";
            $this->_Post_Address = "Post_Address";
            $this->_Post_Code = "Post_Code";
            $this->_Account_Status = "Account_Status";
            $this->_Continue_Fail_Count = "Continue_Fail_Count";
            $this->_News_Subscription = "News_Subscription";
            $this->_D_Of_Create = "Date_Of_Create";
        }
    }

    class User_DB 
    {
        private $_db_con;
        //private $_user;
        private $_user_Table;

        function __construct()
        {
            
            require_once PATH_APP_LIB.'db.php';
            $this->_db_con = new DB(DB_HOST,DB_USER,DB_PASS,DB);   
            $this->_user = new User();
            $this->_user_Table = new User_Table();
        }

        // (Method of add new user)
        // --> Check if the 'user name' exit or not
        //      --> If 'user name' not exit
        //          --> Add user
        //      --> If 'user name' exit
        //          --> Remind the user to change to use another 'user name'
        public function New_User(User $user)
        {
            $user_Name_Exit = $this->User_Name_Exist($user->_User_Name);
            if(!$user_Name_Exit)
            {
                $this->Add_User($user);
                //$_SESSION["_userName"] = $user->_userName;
                //header("location:../Views/MainPage.php"); //RegSuccess.php
                require PATH_APP_VIEW.'RegSuccess.php';
            }
            else
            {
                require PATH_APP_VIEW.'ERROR_USER_EXISTS.php';
            }
        }

        // Insert User to Database
        private function Add_User(User $user)
        {
            $this->_user_Table = new User_Table();      
            
            $_sql = 'INSERT INTO `'
                    .  $this->_user_Table->Table .'` (`'
                    . $this->_user_Table->_User_Name.'`, `' . $this->_user_Table->_Pasword.'`, `' . $this->_user_Table->_Full_Name.'`, `'
                    . $this->_user_Table->_Email_Address.'`, `' . $this->_user_Table->_Date_Of_Birth.'`, `' . $this->_user_Table->_Post_Address.'`, `'
                    . $this->_user_Table->_Post_Code.'`, `' . $this->_user_Table->_Account_Status.'`, ' . $this->_user_Table->_Continue_Fail_Count.', `'
                    . $this->_user_Table->_D_Of_Create.'`,`'.$this->_user_Table->_News_Subscription.'`) '
                    . ' VALUES (?,?,?,?,?,?,?,1,0, NOW(),false);';
            //echo $_sql .'<br>';
            $insert = $this->_db_con->query($_sql,$user->_User_Name, $user->_Pasword, $user->_Full_Name, $user->_Email_Address, $user->_Date_Of_Birth, $user->_Post_Address, $user->_Post_Address);
            //echo $insert->affectedRows(). '<br>';
            $this->_db_con->close();
        }

        // Check if 'user name' exit or not
        private function User_Name_Exist($_userName)
        {
            $userName_Exits = false;
            $_sql = 'SELECT `'. $this->_user_Table->_User_Name
                    . '` FROM `'.  $this->_user_Table->Table
                    . '` WHERE (`' . $this->_user_Table->_User_Name .'` = ?)';
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql,$_userName);
            $num_Of_Rows = $select-> numRows();
            if($num_Of_Rows>0)
            {
                $userName_Exits = true;
            }
            return $userName_Exits;
        }


        /*
            Login by 'user name' and 'password'
                --> Check the 'user name' and 'passowrd' is exit or not
                    (YES) --> Login success
                    (NO)  --> Login Fail
        */
        public function Login($_userName, $_password)
        {
            //--> Check the 'user name' and 'passowrd' is exit or not
            $user_Exits = $this->User_Exits($_userName, $_password);
            if($user_Exits)
            {
                //(YES) --> Login success
                //          --> Set Login Fail counter to 0
                $this->UpdateUser_FailCount_To_Zero($_userName);
                //          --> Load the MainPage webpage for the permitted user
                $_SESSION["_userName"] = $_userName;
                //require PATH_APP_VIEW.'MainPage.php';
                header("location:../Views/MainPage.php"); 
                
            }
            else
            {   //(NO)  --> Login Fail
                //          --> Request for Login Fail counter value
                $_current_Faile_Count = $this->Current_FailCount($_userName);
                //          --> Check if the Login Fail counter value is less than 3
                if($_current_Faile_Count <3)
                {
                    //          --> Check if the Login Fail counter value is not -1 ( value of -1 means User Not exit)
                    if($_current_Faile_Count != - 1)
                    {
                        //          --> If fail password update the fail count value +1
                        $this->UpdateUser_FailCount_Add_One($_userName);
                        //          --> If fail password load the ERROR_FailLogin.php
                        require PATH_APP_VIEW.'ERROR_FailLogin.php';
                    }
                    else
                    {
                        //          --> If user not exit load the ERROR_User_NotExit.php
                        require PATH_APP_VIEW.'ERROR_User_NotExit.php';
                    }
                    
                }
                else
                {
                    require PATH_APP_VIEW.'ERROR_NoMoreLogin.php';
                }
                
            }
        }

        // Check if the 'user name' and 'password' is exit in the user table
        private function User_Exits($_userName, $_password)
        {
            $userName_Exits = false;
            $_sql = 'SELECT `'. $this->_user_Table->_User_Name
                    . '` FROM `'.  $this->_user_Table->Table
                    . '` WHERE ((`' . $this->_user_Table->_User_Name .'` = ?) '
                    . ' AND (`'. $this->_user_Table->_Pasword . '` =? ));';  
                    ;
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql,$_userName, $_password);
            $num_Of_Rows = $select-> numRows();
            if($num_Of_Rows>0)
            {
                $userName_Exits = true;
            }
            return $userName_Exits;
        }

        // Update the Fail Count to 0 to the Database
        private function UpdateUser_FailCount_To_Zero($_userName)
        {
            $_sql = 'UPDATE `'.  $this->_user_Table->Table .'`'
                    . ' SET '. $this->_user_Table->_Continue_Fail_Count . ' = 0 '
                    . ' WHERE '.$this->_user_Table->_User_Name.' = ?;';
            //echo $_sql .'<br>';
            $update = $this->_db_con->query($_sql,$_userName);
            //echo $update->affectedRows();
            $this->_db_con->close();
        }

        // Update the Fail Count by exiting value +1
        private function UpdateUser_FailCount_Add_One($_userName)
        {
            $_sql = 'UPDATE `'.  $this->_user_Table->Table .'`'
                    . ' SET '. $this->_user_Table->_Continue_Fail_Count . ' = ' .$this->_user_Table->_Continue_Fail_Count . '+ 1 '
                    . ' WHERE '.$this->_user_Table->_User_Name.' = ?;';
            //echo $_sql .'<br>';
            $update = $this->_db_con->query($_sql,$_userName);
            //echo $update->affectedRows(). '<br>';
            $this->_db_con->close();
        }

        // Check Current Fail Count value of the user
        private function Current_FailCount($_userName)
        {
            $Current_Fail_Count = 0;
            $_sql = 'SELECT `'. $this->_user_Table->_Continue_Fail_Count
                    . '` FROM `'.  $this->_user_Table->Table
                    . '` WHERE (`' . $this->_user_Table->_User_Name .'` = ?);';  
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql,$_userName)->fetchArray();
            $numOfRow = $this->_db_con->query($_sql,$_userName)-> numRows();

            if($numOfRow >0)
            {
                $Current_Fail_Count =$select[$this->_user_Table->_Continue_Fail_Count];            
            }
            else
            {
                $Current_Fail_Count = -1;
            }
            //echo $select[$this->_user_Table->_Continue_Fail_Count].'<br>';
            return $Current_Fail_Count;
        }


        public function Exiting_Subscription_Status($_userName)
        {
            $_sql = 'SELECT `'. $this->_user_Table->_News_Subscription
                    . '` FROM `'.  $this->_user_Table->Table
                    . '` WHERE (`' . $this->_user_Table->_User_Name .'` = ?);';
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql,$_userName)->fetchArray();
            return $select[$this->_user_Table->_News_Subscription];
        }

        public function Update_Subscription_Status($_userName, $_subscription_Status)
        {
            $_sql = 'UPDATE `'. $this->_user_Table->Table
                    . '` SET `'.  $this->_user_Table->_News_Subscription. '` = ?'
                    . ' WHERE (`' . $this->_user_Table->_User_Name .'` = ?);';
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql,$_subscription_Status , $_userName);
            //return $select[$this->_user_Table->_News_Subscription];
        }

    }
?>