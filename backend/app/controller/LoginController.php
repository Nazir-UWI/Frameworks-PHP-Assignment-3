<?php

namespace app\controller;

class LoginController extends \framework\class_abstract\Abstract_Controller implements \framework\class_interface\Interface_LoginController{

    public function __construct(){
    }

	public function index(){
        $this->setPath('login.php');
        $this->display();
        return;
    }
    
    public function newLogin(){
		$email = $this->cleanInput($_POST['email']);
		$password = $this->cleanInput($_POST['password']);

        \framework\session_manager\SessionManager::start();                                                     //creates session if one doesnt exist
		$lValid = new \framework\validator\loginValidator();

		$this->setPath('login.php');

		if ($lValid->validateLogin($email, $password) ){										//if valid login

			$loginResult = $this->model->getLogin($email);										//get login record
			$loginExist = $this->verifyLogin($password, $loginResult);								//verify record
				
			if( $loginExist ){																		//if login matches
				$loginResult = $this->model->getLogin($email, $password);							//get login record again
				$loginId = $this->getLoginId($loginResult);												//return user id;

				$roleRecord = $this->model->getRole($loginId);										//get login role

				if (isset($roleRecord['role_ref_id'])){
					$roleRefId = $roleRecord['role_ref_id'];												//return role ref id
				} else{
					$roleRefId = 0;
				}

				$_SESSION["Current_User"] = $loginId;													//store the id of the current logged in user
				$this->updateRole($roleRefId);															//update view based on role ref id
			}
		}else{																					//else invalid login
			$this->overrideErrors($lValid->getErrors());
		}
						                 
        $this->display();															
		
	}

	private function verifyLogin($password, $result){													//verifies that the login information matches database records

		$loginRecord = $result->fetch_assoc();
		if ($result->num_rows == 0){
			$this->setErrors('email', "Incorrect email or password");
			return false;
		}
		
		if ( password_verify($password, $loginRecord['password']) ){
			return true;
		}else{
			 $this->setErrors('email', "Incorrect email or password");
			return false;
		}
	}

	private function updateRole($roleRefId){															//determines user role of logged in user
		switch ($roleRefId){
			case '1':
				$this->setPath('admin_dashboard.php');
				\framework\session_manager\sessionManager::set("admin", true);
				\framework\session_manager\sessionManager::set("manager", false);
				\framework\session_manager\sessionManager::set("employee", false);
				break;
			case '2':
				$this->setPath('manager_dashboard.php');
				\framework\session_manager\sessionManager::set("admin", false);
				\framework\session_manager\sessionManager::set("manager", true);
				\framework\session_manager\sessionManager::set("employee", false);
				break;
			case '3':
				$this->setPath('employee_dashboard.php');
				\framework\session_manager\sessionManager::set("admin", false);
				\framework\session_manager\sessionManager::set("manager", false);
				\framework\session_manager\sessionManager::set("employee", true);
				break;
			default:
				$this->setErrors('password', 'No Role Found');
				$this->setPath('login.php');
		}
	}

	private function getLoginId($result){																	//retrieves the user id of the current logged in user
		$loginRecord = $result->fetch_assoc();
		return $loginRecord['user_id'];;
	}


}