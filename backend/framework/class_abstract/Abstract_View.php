<?php

namespace framework\class_abstract;
abstract class Abstract_View{

    protected $tpl;
    protected $act = [];
    protected $dat = [];
    protected $err = [];
    
    public function __construct() {
    }
    
  
    public function updatePath($path){
        $this->tpl = $path;
    }

    public function updateAction($action){
        $this->act = $action;
    }

    public function updateData($data){
        $this->dat = $data;
    }

    public function updateErrors($errors){
        $this->err = $errors;
    }

    
    public function display(){
        $action = $this->act;
		$data = $this->dat;
		$errors = $this->err;
		extract($action);
		extract($data);
		extract($errors);
        require_once LAYOUTS_DIR."/$this->tpl";
    }
    
        
    
}