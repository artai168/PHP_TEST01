<?php
// Start the session


    if (!isset($_SESSION))
    {
        session_start();
    }


    include_once '../ini/_default.ini.php';
    include_once '../Controllers/FAQ_Controller.php';
    
    $faq_Controller = new FAQ_Controller;

    $Category = null;
    include_once PATH_APP_VIEW_COMMON.'header.php';

    if(isset($_GET['cat']))
    {
        $Category = $_GET['cat'];
        
        if($Category!= null)
        {   
            include_once PATH_APP_CONTROLLERS.'FAQ_Controller.php';    
            $faq_Controller->Load_All_SubCategories($Category);
            include_once PATH_APP_VIEW_COMMON.'footer.php';
        }
    }
    
    $SubCategory = isset($_GET['sub_cat']) ? $_GET['sub_cat'] : null;
    $Title = isset($_GET['title']) ? $_GET['title'] : null; 
    
    if($Title == null)
    {
        if(($Category!= null) &&($SubCategory!= null))
        {
            include_once PATH_APP_CONTROLLERS.'FAQ_Controller.php'; 
            $faq_Controller->Load_All_Titles($Category,$SubCategory);
            include_once PATH_APP_VIEW_COMMON.'footer.php';
        }  
        elseif($Category == null)
        {
            include_once PATH_APP_CONTROLLERS.'FAQ_Controller.php'; 
            $faq_Controller->Load_All_Categories();     
            include_once PATH_APP_VIEW_COMMON.'footer.php';    
        }
    }
    else
    {
        if(($Category!= null) &&($SubCategory!= null) && ($Title != null))
        {
            include_once PATH_APP_CONTROLLERS.'FAQ_Controller.php'; 
            $faq_Controller->Load_All_Details($Category,$SubCategory,$Title);
            include_once PATH_APP_VIEW_COMMON.'footer.php';  
        }
    }
?>