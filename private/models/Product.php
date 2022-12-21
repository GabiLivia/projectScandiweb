<?php

class Product extends Model{

    
   
    public function validate($data){
        $this->errors=array();
        //check for name
        if(empty($data['name']) || !preg_match('/^[A-Za-z\s]*$/', $data['name'])){
            $this->errors['name']="Please provide a valid name for the product.";

        }
        if(empty($data['SKU']) || !preg_match('/^[a-zA-Z0-9]+/', $data['SKU'])){
            $this->errors['name']="Only alphanumeric characters allowed in SKU";

        }
         //check if SKU exists
         if($this->where('SKU', $data['SKU'])){
            $this->errors['SKU']="SKU already exists";
        }

        //check for number
        if(empty($data['price']) || !is_numeric($data['price'])){
            $this->errors['price']="Please provide a valid price";
        }

        $valid_size=empty($data['size']);
        $valid_furniture=(empty($data['height']) && empty($data['width']) && empty($data['length']));
        $valid_book=empty($data['weight']);



        if($valid_furniture && $valid_book &&(empty($data['size']) || !is_numeric($data['size']))){
        $this->errors['size']="Please provide a valid size";
        }

        $furniture_height=empty($data['height']) || !is_numeric($data['height']);
        $furniture_width=empty($data['width']) || !is_numeric($data['width']);
        $furniture_length=empty($data['length']) || !is_numeric($data['length']);

            
        if($valid_size && $valid_book &&($furniture_height && $furniture_width && $furniture_length)){
        $this->errors[]="Please provide a valid height, width and length for the product";
        };

        if($valid_size && $valid_furniture && (empty($data['weight']) || !is_numeric($data['weight']))){
        $this->errors['weight']="Please provide a valid weight";
        }
        
        if(count($this->errors)==0){
            return true;
        }
        return false;

    }


}