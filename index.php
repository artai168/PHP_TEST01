<?php
    include_once './ini/_default.ini.php';

    include_once PATH_APP_INI.'setup.php';
    // Setup Database, if database not exit;
    $_Start_DB = new Setup_Databse();

    //Start Application        
    include_once PATH_APP_VIEW.'AppStart.php';
?>