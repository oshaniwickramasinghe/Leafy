<?php
class Database
{
    private function connect()
    {
        $str = DBDRIVER.":hostname=".HOSTNAME.";dbname=".DBNAME;
        return new PDO($str,DBUSER,DBPASS);
    }

    public function query($query,$data = [],$type = 'object')
        {
            $con = $this->connect();

            $stm = $con -> prepare($query);

            if($stm)
            {
                $check= $stm -> execute($data);

                if($check)
                {
                    
                    if($type == 'object')
                    {
                        $type = PDO::FETCH_ASSOC;
                    }else
                    {
                        $type = PDO::FETCH_OBJ;
                    }
                    
                    $result = $stm -> fetchAll($type);

                    if(is_array($result) && count($result)>0)
                    {
                        return $result;
                    }
                }
            }
            return false;
// create instructor tables
           
            
        } 

        
            public function create_tables()
            {
            $query= "CREATE TABLE IF NOT EXISTS`instructor` (
                `user_ID` int(100) NOT NULL AUTO_INCREMENT,
                `first_name` varchar(50) NOT NULL,
                `last_name` varchar(50) NOT NULL,
                `email` varchar(50) NOT NULL,
                `contact_number` varchar(10) NOT NULL,
                `password` varchar(50) NOT NULL,
                `occupation` varchar(25) NOT NULL,
                `specialized_area` varchar(50) NOT NULL,
                `education_level` varchar(50) NOT NULL,
                `role` varchar(25) NOT NULL,
                `image` varchar(100) NOT NULL,
                PRIMARY KEY (`user_ID`)
               ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4";

               $this-> query($query);
        }

    
}