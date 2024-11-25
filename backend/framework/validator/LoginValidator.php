<?php

namespace framework\validator;

class LoginValidator{

	private $errors = [];

	public function validateLogin($email, $password){

		$result = true;
		
		if (empty($email)){												//Validate email
			$this->setErrors('email', 'Email required');
			$result = false;
		}
		if (empty($password)){												//Validate password
			$this->setErrors('password', 'Password required');
			$result = false;
		}

		return $result;
	}

	public function setErrors($key,$value){
		return $this->errors[$key] = $value;
	}

	public function getErrors(){
		return $this->errors;
	}



}

