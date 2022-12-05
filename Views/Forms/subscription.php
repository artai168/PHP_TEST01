<?php
    include_once PATH_APP_CONTROLLERS.'NewsLetter_Controller.php';

    $_userName = $_SESSION["_userName"];
    $_check_Val =load_subscription($_userName);

    if(!empty($_POST))
    {
        change_subscription();
    }

    function load_subscription($_userName)
    {
        if($_userName != null)
        {
            $str_result = "";
            $register = new NewsLetter_Controller($_userName);
            $current_status = $register->check_Current_Status($_userName);
            if($current_status == 1 )
            {
                $str_result = "checked";
            }
            //echo "The current status --> ". $current_status;
            return $str_result;
        }
    }
    
    function change_subscription()
    {   
        global $_check_Val;          
        $_userName = isset($_POST['_user_name']) ? $_POST['_user_name'] : null;
        $_subscribe = isset($_POST['_subscribe']) ? $_POST['_subscribe'] : null;
        $_subscribe =CheckBox_To_DB($_subscribe);
        $register = new NewsLetter_Controller();
        $register->Update_Status($_userName, $_subscribe);
        $_check_Val = load_subscription($_userName);
    }

    function CheckBox_To_DB($in_Value)
    {
        if($in_Value =='on')
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

?>

<div> News Subscription </div>
<form name ='Subscription' action='' method='POST'>
    <label for='Subscripte'>Subscribe for news letter</label>
    <input type='checkbox' id='_subscribe' name='_subscribe' <?php echo $_check_Val; ?>>
    <input type='text' id='_user_name' name='_user_name' value='<?php echo $_userName; ?>'>
  <button>Subscribe</button>
</form>
