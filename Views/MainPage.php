<?php
// Start the session
    if (!isset($_SESSION))
    {
        session_start();
    }
    include_once '../ini/_default.ini.php';
?>


<?php include_once PATH_APP_VIEW_COMMON.'header.php';?>
<body>
    <?php 
        //echo "USER NAME --> ". $_SESSION["_userName"]."<br>";

        if(isset($_SESSION["_userName"]))
        {
            include_once PATH_APP_VIEW.'FAQ.php';
            echo "<br><br><br>";
            include_once PATH_APP_VIEW_FROMS.'subscription.php';
        }
        else
        {
            echo "<div>YOU ARE NOT ALLOWED TO VISIT THIS PAGE!</div>";
        }
    ?>    
</body>
<?php include_once PATH_APP_VIEW_COMMON.'footer.php';?>