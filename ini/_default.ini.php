<?php
    //Define Database connection
	defined("DB_HOST") ? null : define("DB_HOST", "localhost");
	defined("DB_USER") ? null : define("DB_USER", "root");
	defined("DB_PASS") ? null : define("DB_PASS", "");
	defined("DB") ? null : define("DB", "Driverless_Members");

    //Define File Paths
    define('PATH_DS', DIRECTORY_SEPARATOR);
    define('PATH_ROOT', realpath(dirname(dirname(__FILE__))) . PATH_DS);
    //define('PATH_APP', PATH_ROOT . 'Assignment' . PATH_DS);
    define('PATH_APP', PATH_ROOT );

    define('PATH_APP_INI', PATH_APP.'ini'.PATH_DS);
    define('PATH_APP_CONTROLLERS', PATH_APP.'Controllers'.PATH_DS);
    define('PATH_APP_MODELS', PATH_APP.'Models'.PATH_DS);
    define('PATH_APP_LIB', PATH_APP.'lib'.PATH_DS);

    define('PATH_APP_VIEW', PATH_APP.'Views'.PATH_DS);
    define('PATH_APP_VIEW_COMMON', PATH_APP_VIEW.'Common'.PATH_DS);
    define('PATH_APP_VIEW_FROMS', PATH_APP_VIEW.'Forms'.PATH_DS);

    //define('PATH_URLVIEW',dirname(PATH_ROOT).PATH_DS.'_'.PATH_DS);
    define('PATH_BASE_URL', "http://".$_SERVER['HTTP_HOST'].'/Assignment'.'_/');
    define('PATH_BASE_LINK', "http://".$_SERVER['HTTP_HOST'].'/Assignment');

/*
    echo "File path: ".__DIR__. "<br>";
    echo 'PATH_DS: '. PATH_DS."<br>";
    echo 'PATH_ROOT: '. PATH_ROOT."<br>";
    echo 'PATH_APP: '. PATH_APP."<br>";
    echo '---------------------------<br>';
    echo 'PATH_APP_MODELS: '. PATH_APP_MODELS."<br>";
    echo '---------------------------<br>';
    echo 'PATH_APP_VIEW: '. PATH_APP_VIEW."<br>";
    echo 'PATH_APP_VIEW_COMMON: '. PATH_APP_VIEW_COMMON."<br>";
    echo 'PATH_APP_VIEW_FROMS: '. PATH_APP_VIEW_FROMS."<br>";
    echo '---------------------------<br>';
    echo 'PATH_APP_CONTROLLERS: '. PATH_APP_CONTROLLERS."<br>";
    echo '---------------------------<br>';
    echo 'PATH_APP_INI: '. PATH_APP_INI."<br>";
    echo 'PATH_APP_LIB: '. PATH_APP_LIB."<br>";    
    echo '---------------------------<br>';
    echo 'PATH_BASE_URL: '. PATH_BASE_URL."<br>";
    echo 'PATH_BASE_LINK: '. PATH_BASE_LINK."<br>";
    */

?>