<?php
    class FAQ_Controller
    {
        //private $_faq;
        private $_faqDB;
        private $_faqTable;
        function __construct()
        {
            require_once PATH_APP_MODELS."FAQ.php";
            //$this->_faq = new FAQ();
            $this->_faqDB = new FAQ_DB();
            $this->_faqTable = new FAQ_Table();
        }

        public function Load_All_Categories()
        {
            $results = $this->_faqDB->Load_Category_List();
            foreach($results as $result)
            {                
                echo "<a href='faq.php?cat=".$result[$this->_faqTable->_Category]."'>".$result[$this->_faqTable->_Category]."</a><br>";
            }
        }

        public function Load_All_SubCategories($_in_Category)
        {
            $results = $this->_faqDB->Load_SubCategory_List_by_Cat($_in_Category);
            echo "<a href='faq.php?cat=".$_in_Category."'>".$_in_Category."</a>";
            echo "&nbsp; > &nbsp;";
            echo "<br><br>";
            foreach($results as $result)
            {                
                echo "<a href='faq.php?cat=".$_in_Category."&sub_cat=".$result[$this->_faqTable->_Sub_Category]."'>".$result[$this->_faqTable->_Sub_Category]."</a>";
                echo "<br><br>";
            }          
        }

        public function Load_All_Titles($_in_Category, $in_Sub_Category)
        {
            $results = $this->_faqDB->Load_Title_by_Cat_N_SubCat($_in_Category, $in_Sub_Category);
                echo "<a href='faq.php?cat=".$_in_Category."'>".$_in_Category."</a>";
                echo "&nbsp; > &nbsp;";
                echo "<a href='faq.php?cat=".$_in_Category."&sub_cat=".$in_Sub_Category."'>".$in_Sub_Category."</a>";
                echo "&nbsp; > &nbsp;";
                echo "<br><br>";

            foreach($results as $result)
            {
                echo "<a href='faq.php?cat=".$_in_Category."&sub_cat=".$in_Sub_Category."&title=".$result[$this->_faqTable->_Topic]."'>".$result[$this->_faqTable->_Topic]."</a><br>";;
            }            
        }

        public function Load_All_Details($_in_Category, $in_Sub_Category, $in_Topic)
        {
            $results = $this->_faqDB->Load_Detail_by_Cat_N_SubCat_N_Title($_in_Category, $in_Sub_Category, $in_Topic);
                echo "<a href='faq.php?cat=".$_in_Category."'>".$_in_Category."</a>";
                echo "&nbsp; > &nbsp;";
                echo "<a href='faq.php?cat=".$_in_Category."&sub_cat=".$in_Sub_Category."'>".$in_Sub_Category."</a>";
                echo "&nbsp; > &nbsp;";
                echo "<a href='faq.php?cat=".$_in_Category."&sub_cat=".$in_Sub_Category."'&title=".$in_Topic."'>".$in_Topic."</a>";
                echo "&nbsp; > &nbsp;";
                echo "<br><br>";
            foreach($results as $result)
            {                
                echo nl2br($result[$this->_faqTable->_Detail])."<br>";
            }       
        }

    }
?>