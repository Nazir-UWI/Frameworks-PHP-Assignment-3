<?php

namespace app\controller;

class AdminDashboardController extends \framework\class_abstract\Abstract_Controller implements \framework\class_interface\Interface_AdminDashboardController{

    public function __construct(){
    }

    public function index(){
        $this->setPath('admin_dashboard.php');
        $this->display();
        return;
    }
    

    public function displayUsersHandler(){                                             //admin button, displays all users
        $this->setPath('admin_dashboard.php');
        $this->setAction('displayUsers');
        $this->setData($this->model->getAllUsers());
        $this->setErrors('displayUsers', 'No Users Found');

        $this->display();                                                                                 //display function in view redirects user
    }


    public function createUserHandler(){                                                          //admin button, shows the create users form
        $this->setPath('admin_dashboard.php');
        $this->setAction('createUser');

        $this->display(); 
    } 

    public function createUser(){                                   
        \framework\session_manager\SessionManager::start();                                                     //creates session if one doesnt exist

        $registerValidator = new \framework\validator\RegisterValidator();                                      //validator for the register form

		$username = $this->cleanInput($_POST['username']);                                                      //retrieve POST form data
		$email = $this->cleanInput($_POST['email']);
		$password = $this->cleanInput($_POST['password']);

		$users = $this->model->getAllUsers();		                                                            //retrieves list of all									

		if ($registerValidator->validateRegister($username, $email, $password, $users) ){				        //check if form data is valid							
			$this->model->createUser($username,$email,$password);	                                                //add user data to database						
		}																			                        //else form data is invalid	
		$this->overrideErrors($registerValidator->getErrors());	                                                    //fetch errors from the validator
        $this->setPath('admin_dashboard.php');						                                            //update the view to redirect user back to register form
		
        $this->createUserHandler();
    }
    

    public function deleteUserHandler(){
        $this->setPath('admin_dashboard.php');
        $this->setAction('deleteUser');
        $this->setData($this->model->getAllUsers());

        if (!isset($this->data[0]['user_id'])){
            $this->setErrors('deleteUser', "No Users Found");
        }

        $this->display();                                                                                 
    }

    public function deleteUser(){
        $user_id = $_POST['user_id'];
        $this->model->deleteUser($user_id);

        $this->deleteUserHandler();
    }


    public function assignRoleHandler(){
        $this->setPath('admin_dashboard.php');
        $this->setAction('assignRole');
        $this->setData($this->model->getAllUsers());

        if (!isset($this->data[0]['user_id'])){
            $this->setErrors('deleteUser', "No Users Found");
        }

        $this->display(); 
    }

    public function assignRole(){
        $user_id = $this->cleanInput($_POST['user_id']);
        $role_ref_id = $this->cleanInput($_POST['role_ref_id']);

        if ($this->model->assignRole($user_id, $role_ref_id)){
            $this->setErrors('role_ref_id', "Assigned Role Successfully");
        }else{
            $this->setErrors('role_ref_id', "Failed to Assign Role");
        }
        
        $this->assignRoleHandler();
    }


    public function displayTasksHandler(){
        $this->setPath('admin_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getAllTasks());
        $this->setErrors('displayTasks', "No Tasks Found");

        $this->display();                                                                                 
    }

    
    public function displayTaskStatsHandler(){
        $this->setPath('admin_dashboard.php');
        $this->setAction('displayTaskStats');
        $this->setData($this->model->getTaskStats());

        $this->display();                                                                                 

    }

    

}