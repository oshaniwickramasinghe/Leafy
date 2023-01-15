<?php

// main model class

class Model extends Database
{

    protected $table = "";
    public function insert($data)
    {
        show($data);
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
        $this->query($query,$data);

    }


    // return array of array

    public function where($data)
    {
        $keys = array_keys($data);
        $query = "SELECT * FROM " .$this->table . " WHERE ";

         foreach($keys as $key){
            $query  .= $key ."=:" .$key . "&&";
        }
        

        $query = trim($query, "&& ");

         $res= $this->query($query,$data);
         if(is_array($res))
         {
            return $res;
         }

          return false;

    }



    // return object
public function first($data)
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
}
