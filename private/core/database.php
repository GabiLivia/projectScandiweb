<?php

class Database{

    private function connect(){
        $mysql_con="mysql:host=localhost;dbname=products_scandiweb";
        if(!$con=new PDO($mysql_con, 'root', '')){
            die('Could not connect to the database');
        }
        return $con;
    }

    public function query($query, $data=array(), $data_type="object"){
        $con=$this->connect();
        $statement=$con->prepare($query);

        if($statement){
            $check=$statement->execute($data);
            if($check){
                if($data_type=="object"){
                    $data=$statement->fetchAll(PDO::FETCH_OBJ);
                }else{
                    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
                }
                if(is_array($data) && count($data)>0){
                    return $data;
                }
            }
        }

    }


}