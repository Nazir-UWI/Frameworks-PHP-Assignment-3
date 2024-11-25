<?php

namespace app\model;

class ManagerDashboardModel extends \framework\class_abstract\Abstract_Model implements \framework\class_interface\Interface_ManagerDashboardModel{

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

	public function getTasksById($taskid){

		$query = "SELECT * FROM Tasks WHERE task_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $taskid);
		$stmt->execute();
		$result = $stmt->get_result();

		$task = $result->fetch_assoc();

		return $task;
	}


	public function getTasksAll($managerid){

		$query = "SELECT * FROM Tasks WHERE created_by = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $managerid);
		$stmt->execute();
		$result = $stmt->get_result();

		$tasks = [];

		if ($result->num_rows > 0){									
			while ($row = $result->fetch_assoc() ){					
				$tasks[] = $row;
			}
		}

		return $tasks;
	}

	public function getTasksPending($managerid){
		$query = "SELECT * FROM Tasks WHERE created_by = ? AND status = 'Pending'";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $managerid);
		$stmt->execute();
		$result = $stmt->get_result();

		$tasks = [];

		if ($result->num_rows > 0){									
			while ($row = $result->fetch_assoc() ){					
				$tasks[] = $row;
			}
		}

		return $tasks;
	}

	public function getTasksInProgress($managerid){
		$query = "SELECT * FROM Tasks WHERE created_by = ? AND status = 'In Progress'";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $managerid);
		$stmt->execute();
		$result = $stmt->get_result();

		$tasks = [];

		if ($result->num_rows > 0){									
			while ($row = $result->fetch_assoc() ){					
				$tasks[] = $row;
			}
		}
		return $tasks;
	}

	public function getTasksCompleted($managerid){
		$query = "SELECT * FROM Tasks WHERE created_by = ? AND status = 'Completed'";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $managerid);
		$stmt->execute();
		$result = $stmt->get_result();

		$tasks = [];

		if ($result->num_rows > 0){									
			while ($row = $result->fetch_assoc() ){					
				$tasks[] = $row;
			}
		}
		return $tasks;
	}



	public function assignTask($user_id, $task_id){
		$query = "UPDATE Tasks SET assigned_to = ? WHERE task_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("ii", $user_id, $task_id);
		return $stmt->execute();
	}


	public function updateTask($taskid, $title, $description, $status, $date){
		$query = "UPDATE Tasks SET title = ?, description = ?, status = ?, due_date = ? WHERE task_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("ssssi", $title, $description, $status, $date, $taskid);
		return $stmt->execute();
	}

	
	public function createTask($title, $description, $status, $assignedto, $createdby, $date){	
		$query = "INSERT INTO Tasks (title, description, status, assigned_to, created_by, due_date) VALUES (?, ?, ?, ?, ?, ?) ";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("sssiis", $title, $description, $status, $assignedto, $createdby, $date);
		return $stmt->execute();
	}
    
}