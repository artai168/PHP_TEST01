<?php
    if (!isset($_SESSION))
    {
        session_start();
    }

    class FAQ
    {
        public $_ID;
        public $_Category;
        public $_Sub_Category;
        public $_Topic;
        public $_Detail;
    }

    class FAQ_Table extends FAQ
    {
        public $Table;
        function __construct()
        {
            $this->Table = "FAQ";
            $this->_ID = "ID";
            $this->_Category = "Category";
            $this->_Sub_Category = "Sub_Category";
            $this->_Topic = "Topic";
            $this->_Detail = "Detail";
        }
    }

    class FAQ_DB
    {
        private $_db_con;
        private $_faq_Table;
        function __construct()
        {
            require_once '../ini/_default.ini.php';
            require_once PATH_APP_LIB.'db.php';
            $this->_db_con = new DB(DB_HOST,DB_USER,DB_PASS,DB);   
            $this->_faq = new FAQ();
            $this->_faq_Table = new FAQ_Table();
        }

        public function Load_All()
        {
            $_sql = 'SELECT *'
                    . ' FROM `'.  $this->_faq_Table->Table.'`;' 
                    ;
            //echo $_sql .'<br>';
            $select = $this->_db_con->query($_sql);
            $result = $select->fetchArray();
            return $result;
        }

        public function Load_Category_List()
        {
            $_sql = 'SELECT '.  $this->_faq_Table->_Category
            . ' FROM `'.  $this->_faq_Table->Table.'` ' 
            . ' GROUP BY `'.  $this->_faq_Table->_Category.'` ' 
            . ' ORDER BY `'.  $this->_faq_Table->_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql)->fetchAll();
            return $results;
        }

        public function Load_SubCategory_List()
        {
            $_sql = 'SELECT `'. $this->_faq_Table->_Sub_Category
                    . '` FROM `'.  $this->_faq_Table->Table.'` ' 
                    . ' GROUP BY `'.  $this->_faq_Table->_Sub_Category.'` ' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Sub_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql)->fetchAll();
            return $results;
        }

        public function Load_SubCategory_List_by_Cat($_in_Category)
        {
            $_sql = 'SELECT `'. $this->_faq_Table->_Sub_Category
                    . '` FROM `'.  $this->_faq_Table->Table.'` ' 
                    . ' WHERE `'.  $this->_faq_Table->_Category.'` ="'.$_in_Category.'" ' 
                    . ' GROUP BY `'.  $this->_faq_Table->_Sub_Category.'` ' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Sub_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql)->fetchAll();
            return $results;
        }

        public function Load_Category($_in_Category)
        {
            $_sql = 'SELECT *'
                    . ' FROM `'.  $this->_faq_Table->Table.'`' 
                    . ' WHERE (`'.  $this->_faq_Table->_Category.'`= ?)' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql,$_in_Category)->fetchAll();
            return $results;
        }

        public function Load_SubCategory($_in_Sub_Category)
        {
            $_sql = 'SELECT *'
                    . ' FROM `'.  $this->_faq_Table->Table.'`' 
                    . ' WHERE (`'.  $this->_faq_Table->_Sub_Category.'`= ?)' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Sub_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql,$_in_Sub_Category)->fetchAll();
            return $results;
        }

        public function Load_Title_by_Cat_N_SubCat($_in_Category, $_in_Sub_Category)
        {
            $_sql = 'SELECT *'
                    . ' FROM `'.  $this->_faq_Table->Table.'`' 
                    . ' WHERE ((`'.  $this->_faq_Table->_Category.'`= ?)' 
                    . ' AND (`'.  $this->_faq_Table->_Sub_Category.'`= ?))' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Sub_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql, $_in_Category, $_in_Sub_Category)->fetchAll();
            return $results;
        }

        public function Load_Detail_by_Cat_N_SubCat_N_Title($_in_Category, $_in_Sub_Category, $_in_Title)
        {
            $_sql = 'SELECT *'
                    . ' FROM `'.  $this->_faq_Table->Table.'`' 
                    . ' WHERE ((`'.  $this->_faq_Table->_Category.'`= ?)' 
                    . ' AND (`'.  $this->_faq_Table->_Sub_Category.'`= ?)' 
                    . ' AND (`'.  $this->_faq_Table->_Topic.'`= ?))' 
                    . ' ORDER BY `'.  $this->_faq_Table->_Sub_Category.'`; ' 
                    ;
            //echo $_sql .'<br>';
            $results = $this->_db_con->query($_sql, $_in_Category, $_in_Sub_Category, $_in_Title)->fetchAll();
            return $results;
        }


    }
?>