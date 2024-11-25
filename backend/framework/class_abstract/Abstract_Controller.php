<?php

namespace framework\class_abstract;
abstract class Abstract_Controller{
    protected $model;
    protected $view;
    
    protected $path     = "index";
    protected $action   = [];
    protected $data     = [];
    protected $errors   = [];

    public function __construct(){
    }

    abstract public function index();


    public function setModel($model){
        $this->model = $model;
    }

    public function setView($view){
        $this->view = $view;
    }


    

    public function setPath($value){
		$this->path = $value;
	}

    public function setAction($value){
		$this->action[0] = $value;
	}

    public function setData($value){
		$this->data = $value;
	}

    public function setErrors($key,$value){
		$this->errors[$key] = $value;
	}

    public function overrideErrors($value){
		$this->errors = $value;
	}


    protected function display(){
        $this->view->updatePath($this->path);
        $this->view->updateAction($this->action);	
        $this->view->updateData($this->data);						                                        					                                        
        $this->view->updateErrors($this->errors);						                                        
        $this->view->display();
    }


    protected function cleanInput($data) {                                                                         //removes special characters from form inputs
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

}