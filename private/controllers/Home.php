<?php

class Home extends Controller{
    public function index(){
        $product= $this->load_model('Product');

        $data=$product->findAll();
        //$data=$product->where('name','bed');

        if(count($_POST)>0){
                $product->delete($_POST);
                $this->redirect('home');

        }
        

        echo $this->view('home', ['rows'=>$data]);
    }

    
}