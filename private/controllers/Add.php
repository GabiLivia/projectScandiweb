<?php

class Add extends Controller{


    public function index(){
        $errors=array();

        if(count($_POST)>0){
            $product= $this->load_model('Product');
            if($product->validate($_POST)){
            
                $product->insert($_POST);
                $this->redirect('home');

            }else{
                $errors=$product->errors;
            }
        }

        echo $this->view('add',[
            'errors'=>$errors,
        ]);

    }
}