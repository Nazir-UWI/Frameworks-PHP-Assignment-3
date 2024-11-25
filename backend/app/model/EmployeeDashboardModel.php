<?php

namespace app\model;

class EmployeeDashboardModel extends \framework\class_abstract\Abstract_Model implements \framework\class_interface\Interface_EmployeeDashboardModel{

    public function getTasksById($taskid){

		$query = "SELECT * FROM Tasks WHERE task_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $taskid);
		$stmt->execute();
		$result = $stmt->get_result();

		$task = $result->fetch_assoc();

		return $task;
	}

	public function getTasksAll($employeeid){

		$query = "SELECT * FROM Tasks WHERE assigned_to = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("i", $employeeid);
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

	public function updateTask($taskid, $title, $description, $status, $date){
		$query = "UPDATE Tasks SET title = ?, description = ?, status = ?, due_date = ? WHERE task_id = ?";
		$stmt = $this->db->prepare($query);
		$stmt->bind_param("ssssi", $title, $description, $status, $date, $taskid);
		return $stmt->execute();
	}
}