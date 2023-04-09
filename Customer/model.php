<?php

<<<<<<< HEAD:App/core/model.php
// main model class

class Model extends Database
{

    protected $table = "";
    public function insert($data)
    {
=======
    function insert($data)
    {
        show($data);
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/model.php
        if(!empty($this->arr ))
        {
            foreach ($data as $key => $value){
                if(!in_array($key,$this->arr))
                {
                 unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        // $values = array_values($data);
        $query = "INSERT INTO " . $this->table;
        $query .= " (".implode(",",$keys) .") values (:".implode(",:",$keys) .")";
<<<<<<< HEAD:App/core/model.php

=======
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/model.php
        $this->query($query,$data);

    }


<<<<<<< HEAD:App/core/model.php

    public function where($data)
=======
    // return array of array

    function where($data)
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/model.php
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM " .$this->table . " WHERE ";

         foreach($keys as $key){
            $query  .= $key ."=:" .$key . "&&";
        }
<<<<<<< HEAD:App/core/model.php
=======
        
>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/model.php

        $query = trim($query, "&& ");

         $res= $this->query($query,$data);
         if(is_array($res))
         {
            return $res;
         }

          return false;

    }
<<<<<<< HEAD:App/core/model.php
}
=======



    // return object
 function first($data)
{
    $keys = array_keys($data);
    $query = "SELECT * FROM " .$this->table . " WHERE ";

     foreach($keys as $key){
        $query  .= $key ."=:" .$key . "&&";
    }

    $query = trim($query, "&& ");
    $query .= " order by user_id desc limit 1";

   
     $res= $this->query($query,$data);
     
     if(is_array($res))
     {
     
        return $res[0];
     }

      return false;

}

>>>>>>> 10fda9860a40eea51fdb9d0d98ed94ed1e7a9c52:Customer/model.php
