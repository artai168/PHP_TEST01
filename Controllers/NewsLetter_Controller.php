<?php

    include_once '../ini/_default.ini.php';

    class NewsLetter_Controller
    {
        private $_userName;
        private $_subscribe;

        public function Update_Status($in_UserName, $in_Subscribe)
        {
            $this->_userName = $in_UserName;
            $this->_subscribe = $in_Subscribe;
            if (empty($this->_userName)) 
            {
                throw new Exception("Empty Post not allowed");
            }    
            else
            {
                // Do some stuiff
                //echo " Registration Done";
                require_once PATH_APP_MODELS."User.php";
                $user_DB_Controller = new User_DB();
                $current_subscription_status = $user_DB_Controller->Update_Subscription_Status($this->_userName, $this->_subscribe);
                return $current_subscription_status;
            }
        }

        public function check_Current_Status($in_UserName)
        {
            require_once PATH_APP_MODELS."User.php";
            $user_DB_Controller = new User_DB();
            $current_subscription_status = $user_DB_Controller->Exiting_Subscription_Status($in_UserName);
            return $current_subscription_status;
        }
    }

?>