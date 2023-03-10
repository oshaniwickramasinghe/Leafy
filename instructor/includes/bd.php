<?php

require('config.php');

function printArray($value)
{
    echo "<pre>".print_r($value)."<pre>";
    die();
}

function selectAll($table, $condition =[])
{
    global $conn;

    $sql = "SELECT * FROM $table";

    if(empty($condition)){
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    else{

        $i=0;
        foreach($condition as $key => $value){
            if($i===0){
                $sql = $sql ." WHERE $key = $value";
            }else{
                $sql = $sql ." AND $key = $value";
            }

            $i++;
            
        }

        $stmt = $conn -> prepare($sql);
        $stmt-> execute();
        $records = $stmt -> get_result()-> fetch_all(MYSQLI_ASSOC);
        return $records;
    }

}

$conditions ={

};