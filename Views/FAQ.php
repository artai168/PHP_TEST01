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

    $Category = isset($_GET['cat']) ? $_GET['cat'] : null;
    $SubCategory = isset($_GET['sub_cat']) ? $_GET['sub_cat'] : null;
    $Title = isset($_GET['title']) ? $_GET['title'] : null; 

    /*
        [Category] --> null       --> Load_All_Categories();
                   |
                   --> not null    --> [SubCategory] --> null --> Load_All_SubCategories($Category);
                                                          |
                                                          --> not null --> [Title] null --> Load_All_Titles($Category,$SubCategory)
                                                                                    |
                                                                                    --> not null --> Load_All_Details($Category,$SubCategory,$Title)
    */

    if($Category == null)
    {   
        //echo '1) Load All Categories <br> -->';
        $faq_Controller->Load_All_Categories();               
        include_once PATH_APP_VIEW_COMMON.'footer.php';
    } 
    else
    {
        if($SubCategory == null)
        {
            //echo '2) Load All SubCategories for <br> -->'. $Category;
            $faq_Controller->Load_All_SubCategories($Category);
            include_once PATH_APP_VIEW_COMMON.'footer.php';
        }
        else
        {
            if($Title == null)
            {
                //echo '3) Load All Titles for <br> --> Category: '. $Category .'<br> --> SubCategory: '.$SubCategory;
                $faq_Controller->Load_All_Titles($Category,$SubCategory);
                include_once PATH_APP_VIEW_COMMON.'footer.php';
            }
            else
            {
                //echo '4) Load All Details for <br> --> Category: '. $Category .'<br> --> SubCategory: '.$SubCategory.'<br> --> Title: '.$Title;
                $faq_Controller->Load_All_Details($Category,$SubCategory,$Title);                
                include_once PATH_APP_VIEW_COMMON.'footer.php';  
            }
        }
    }

?>