<?php

namespace app\model;

class AdminDashboardModel extends \framework\class_abstract\Abstract_Model implements \framework\class_interface\Interface_AdminDashboardModel{

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

	public function assignRole($user_id, $role_ref_id){
		switch($role_ref_id){
			case 1:
				$role = "Administrator";
			break;
			case 2:
				$role = "Manager";
			break;
			case 3:
				$role = "Employee";
			break;
		}
		
		$query1 = "SELECT * FROM Roles WHERE user_id = ?";
		$stmt1 = $this->db->prepare($query1);
		$stmt1->bind_param("i",$user_id);
		$stmt1->execute();
		$result1 = $stmt1->get_result();


		if ($result1->num_rows > 0){
			$query2 = "UPDATE Roles SET role=?, role_ref_id=? WHERE user_id=? ";
			$stmt2 = $this->db->prepare($query2);
			$stmt2->bind_param("sii", $role,$role_ref_id,$user_id);
			return $stmt2->execute();
		}else{
			$query3 = "INSERT INTO Roles (role,role_ref_id,user_id) VALUES (?,?,?)";
			$stmt3 = $this->db->prepare($query3);
			$stmt3->bind_param("sii", $role,$role_ref_id,$user_id);
			return $stmt3->execute();
		}
		
	}


	public function getAllTasks(){
		$query = "SELECT * FROM Tasks";
		$result = $this->db->query($query);

		$tasks = [];

		if ($result->num_rows > 0){											//if multiple rows
			while ($row = $result->fetch_assoc() ){								//bind result to 2d array eg users[0]['username']
				$tasks[] = $row;
			}
		}

		return $tasks;
	}


	public function deleteUser($user_id){
		$query1 = "DELETE FROM Tasks WHERE assigned_to = ? OR created_by = ?";
		$stmt = $this->db->prepare($query1);
		$stmt->bind_param("ii", $user_id, $user_id);
		$stmt->execute();

		$query2 = "DELETE FROM Roles WHERE user_id = ?";
		$stmt = $this->db->prepare($query2);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();

		$query3 = "DELETE FROM Users WHERE user_id = ?";
		$stmt = $this->db->prepare($query3);
		$stmt->bind_param("i", $user_id);
		$stmt->execute();

		return;
	}


	public function getTaskStats(){
		$data = [];

		$query1 = "SELECT COUNT(task_id) FROM Tasks GROUP BY task_id";
		$result1 = $this->db->query($query1);
		$data['num_tasks'] = $result1->num_rows;


		$query2 = "SELECT COUNT(status) FROM Tasks WHERE status = 'Pending' GROUP BY task_id";
		$result2 = $this->db->query($query2);
		$data['Pending'] = $result2->num_rows;
		

		$query3 = "SELECT COUNT(status) FROM Tasks WHERE status = 'In Progress' GROUP BY task_id";
		$result3 = $this->db->query($query3);
		$data['In_Progress'] = $result3->num_rows;


		$query4 = "SELECT COUNT(status) FROM Tasks WHERE status = 'Completed' GROUP BY task_id";
		$result4 = $this->db->query($query4);
		$data['Completed'] = $result4->num_rows;

		return $data;
	}
    
}