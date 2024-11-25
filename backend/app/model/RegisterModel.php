<?php

namespace app\model;

class RegisterModel extends \framework\class_abstract\Abstract_Model implements \framework\class_interface\Interface_RegisterModel{

    public function getAllUsers(){
		$query = "SELECT * FROM Users";
		$result = $this->db->query($query);

		$users = [];

		if ($result->num_rows > 0){											//if multiple rows
			while ($row = $result->fetch_assoc() ){								//bind result to 2d array eg users[0]['username']
				$users[] = $row;
			}
		}

		return $users;
	} 

    public function createUser($username, $email, $password){
        $h_password = password_hash ($password, PASSWORD_DEFAULT);

		$query = "INSERT INTO Users (username,email,password) VALUES (?,?,?)";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("sss", $username,$email,$h_password);

		return $stmt->execute();
    }
    
}