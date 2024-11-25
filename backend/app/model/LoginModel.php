<?php

namespace app\model;

class LoginModel extends \framework\class_abstract\Abstract_Model implements \framework\class_interface\Interface_LoginModel{

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

	public function getLogin($email){
		
		$query = "SELECT * FROM Users WHERE email = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;
	}

	public function getRole($id){
		
		$query = "SELECT * FROM Roles WHERE user_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
	
		return $result->fetch_assoc();
	}
    
}