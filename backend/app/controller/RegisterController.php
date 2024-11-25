<?php

namespace app\controller;

class RegisterController extends \framework\class_abstract\Abstract_Controller implements \framework\class_interface\Interface_RegisterController{

    public function __construct(){
    }

    public function index(){
        $this->setPath('register.php');
        $this->display();
        return;
    }
    
    public function newUser(){
        \framework\session_manager\SessionManager::start();                                                     //creates session if one doesnt exist

        $registerValidator = new \framework\validator\RegisterValidator();                                      //validator for the register form

		$username = $this->cleanInput($_POST['username']);                                                      //retrieve POST form data
		$email = $this->cleanInput($_POST['email']);
		$password = $this->cleanInput($_POST['password']);

		$users = $this->model->getAllUsers();		                                                            //retrieves list of all									


		if ($registerValidator->validateRegister($username, $email, $password, $users) ){				        //check if form data is valid							
			$this->model->createUser($username,$email,$password);	                                                //add user data to database						
		}																		                        //else form data is invalid	
		$this->overrideErrors($registerValidator->getErrors());	                                                    //fetch errors from the validator
        $this->setPath('register.php');						                                            //update the view to redirect user back to register form
								                                        
        $this->display();                                                                                 
    }

}