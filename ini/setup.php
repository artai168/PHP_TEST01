<?php
    require_once("./ini/_default.ini.php");
    
    class Setup_Databse
    {
        private $filePath;

        function __construct()
        {
            $this->filePath = './ini/_sys.ini.sql';
            //Try to see if the database is needed to create.
            $this->Database_Setup();
        }

        function Database_Setup()
        {
            $connection = '';
            // Create connection of the MySQL Sever
            $connection = new mysqli(DB_HOST, DB_USER, DB_PASS);
            // Chenck if the Database Exit
            $query = mysqli_query($connection, "SHOW DATABASES LIKE '". DB."';");
            $result = mysqli_num_rows($query);

            // Database not exit
            if ($result <= 0) 
            {
                //echo "Willing to create Database: ".DB.".";
                //echo "Trying to open file path: '". $this->filePath."' <br>";
                if(file_exists($this->filePath))
                {
                    //Create Table by read in the _sys.ini.sql to setup database
                    //echo "Opening file path: '". $this->filePath."' <br>";
                    $this->import_Database_Tables(DB_HOST, DB_USER, DB_PASS, DB, $this->filePath);
                }
                else
                {
                    echo "File not exists: '". $this->filePath."' ";
                }
            }
            else
            {
                //echo "Database: ".DB.". Exists!";
            }
        }

        function import_Database_Tables()
        {
            $db = new mysqli(DB_HOST, DB_USER, DB_PASS); 
            if(!$db ) {
                die('Could not connect: ' . mysqli_error($db));
             }

            $query_file = $this->filePath;   
            $fp = fopen($query_file, 'r');
            $sql = fread($fp, filesize($query_file));
            fclose($fp); 

            //echo "All data in SQL file: ".$sql. "<br>";
            $retval = $db->multi_query($sql); 

            if(! $retval ) {
                die('Could not create table: ' . mysqli_error($db));
             }
             //echo "Table employee created successfully\n";             

             mysqli_close($db);
        }
    }
    ?>