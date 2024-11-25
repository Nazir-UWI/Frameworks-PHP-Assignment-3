<?php

namespace framework\validator;

class RegisterValidator{

	private $errors = [];

	public function validateRegister($username, $email, $password, $users){

		$result = true;

		if (empty($username)){											//Validate username
			$this->setErrors('username', 'Username required');
			$result = false;
		}
		
		if (empty($email)){												//Validate email
			$this->setErrors('email', 'Email required');
			$result = false;
		}else{
			foreach ($users as $user) {
				if ($user['email'] == $email){
					$this->setErrors('email', 'Email is not unique');
						$result = false;
				}
			}
		}

		if (empty($password)){												//Validate password
			$this->setErrors('password', 'Password required');
			$result = false;
		}else{
			if(!$this->calculatePasswordStrength($password)){
				$result = false;
				$this->setErrors('password', 'Weak Password');
			}
		}

		return $result;
	}

	

	public function calculatePasswordStrength($password) {
		$length = strlen($password);
    	$totalBits = 0;

		for ($i = 0; $i < $length; $i++) {

			if ($i == 0) {								//first characters are 4 bits
				$bits = 4;
			} elseif ($i < 8) {							//next 7 characters are 2 bits
				$bits = 2;	
			} elseif ($i < 20) {						//next 12 characters are 1.5 bits
				$bits = 1.5;
			} else {									//others are 1 bit 
				$bits = 1;
			}


			$totalBits += $bits;
		}

		$hasUpper = preg_match('/[A-Z]/', $password);
		$hasLower = preg_match('/[a-z]/', $password);
		$hasNonAlphanumeric = preg_match('/[^a-zA-Z0-9\s]/', $password);							// \s is whitespace

		if ($hasUpper && $hasLower && $hasNonAlphanumeric) {
			$totalBits += 6;

		}

		if ($totalBits > 18){
			return true;
		}else{
			return false;
		}

	}


	public function setErrors($key,$value){
		return $this->errors[$key] = $value;
	}

	public function getErrors(){
		return $this->errors;
	}



}

