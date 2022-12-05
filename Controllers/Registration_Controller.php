<?php

    include_once '../ini/_default.ini.php';
    /*
    if (isset($_POST["_username"])) {
        $user = trim($_POST['_username']);
    }
    if (isset($_POST["_password"])) {
        $psw = trim($_POST['_password']);
    }
    if (isset($_POST["_email"])) {
        $email = trim($_POST['_email']);
    }
    if (isset($_POST["_fullName"])) {
        $name = trim($_POST['_fullName']);
    }
    if (isset($_POST["_date_of_Birth"])) {
        $birth_Date = trim($_POST['_date_of_Birth']);
    }
    if (isset($_POST["_address"])) {
        $address = trim($_POST['_address']);
    }
    if (isset($_POST["_post_Code"])) {
        $post_Code = trim($_POST['_post_Code']);
    }
    */
    $user = isset($_POST['_username']) ?$_POST['_username'] : null;
    $psw = isset($_POST['_password']) ?$_POST['_password'] : null;
    $email = isset($_POST['_email']) ?$_POST['_email'] : null;
    $name = isset($_POST['_fullName']) ?$_POST['_fullName'] : null;
    $birth_Date = isset($_POST['_date_of_Birth']) ?$_POST['_date_of_Birth'] : null;
    $address = isset($_POST['_address']) ?$_POST['_address'] : null;
    $post_Code = isset($_POST['_post_Code']) ?$_POST['_post_Code'] : null;    


    if(!empty($user) && !empty($psw)&& !empty($email)&& !empty($name)&& !empty($birth_Date)&& !empty($address)&& !empty($post_Code))
    {
        require_once PATH_APP_MODELS."User.php";
        $user_DB_Controller = new User_DB();
        $_user = new User();
        $_user->_User_Name = $user;
        $_user->_Pasword = $psw;
        $_user->_Email_Address = $email;
        $_user->_Full_Name = $name;
        $_user->_Date_Of_Birth = $birth_Date;
        $_user->_Post_Address = $address;
        $_user->_Post_Code = $post_Code;
/*
        echo 'USER NAME --> '. $_user->_User_Name. '<br>';
        echo 'PASSWORD --> '. $_user->_Pasword. '<br>';
        echo 'Email --> '. $_user->_Email_Address. '<br>';
        echo 'Full Name --> '. $_user->_Full_Name. '<br>';
        echo 'Birth Date --> '. $_user->_Date_Of_Birth. '<br>';
        echo 'Address --> '. $_user->_Post_Address. '<br>';
        echo 'Post Code --> '. $_user->_Post_Code. '<br>';
*/
        $user_DB_Controller->New_User($_user);
    }


?>