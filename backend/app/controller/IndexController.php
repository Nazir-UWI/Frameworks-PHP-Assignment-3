<?php

namespace app\controller;

class IndexController extends \framework\class_abstract\Abstract_Controller{

    public function __construct(){
    }


    public function index(){
        $this->view->updatePath('index.php');
        $this->view->display();
        return;
    }
    
}


?>