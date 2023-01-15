<?php


class Database{

   private  function connect()
   {
        $str= DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        //connecting database
        $con = new PDO($str,DBUSER,DBPASS);
       //return the result
        return $con;
    }

    public function query($query,$data=[], $type = 'object')
    {
        $con = $this->connect();
        $stm= $con->prepare($query);
        if($stm)
        {
          $check = $stm->execute($data);
          if($check)
          {
            //getting the data from the database as array or object
            
            if($type == 'object')
            {
             $type= PDO::FETCH_OBJ;
            }else{
             $type=PDO::FETCH_ASSOC;
            }
             $result = $stm->fetchAll($type);

            if(is_array($result) && count($result)>0)
            {
                return $result;
            }
           
          }
        }

        return false;
    }
}