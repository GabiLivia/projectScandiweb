<?php

class Model extends Database{
    protected $table='products';

    public $errors=array();

   
    public function where($column, $value){

        $column=addslashes($column);
        $query="SELECT * from $this->table WHERE $column= :value";
        return $this->query($query, [
            'value'=>$value
        ]);
    }

    public function findAll(){

        $query="SELECT * from $this->table";
        return $this->query($query);
    }

    public function insert($data){

        $keys=array_keys($data);
        $column=implode(',', $keys);
        $values=implode(',:', $keys);

        $query="INSERT into $this->table ($column) values (:$values)";
        return $this->query($query, $data);
    }
    public function delete($id){

        $id=array_keys($id);
        $extracted_id=implode(',', $id);

        $query="DELETE from $this->table WHERE id IN($extracted_id)";
        return $this->query($query, $data);
    }


}