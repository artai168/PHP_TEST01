<?php

    include_once '../ini/_default.ini.php';
    
    if (isset($_POST["_user_name"])) {
        $user = trim($_POST['_user_name']);
    }
    if (isset($_POST["_password"])) {
        $psw = trim($_POST['_password']);
    }

    //echo 'USER NAME --> '. $user. '<br>';
    //echo 'PASSWORD --> '. $psw. '<br>';

    if(!empty($user) && !empty($psw))
    {
        require_once PATH_APP_MODELS."User.php";
        $user_DB_Controller = new User_DB();
        $user_DB_Controller->Login($user,$psw);
    }

?>