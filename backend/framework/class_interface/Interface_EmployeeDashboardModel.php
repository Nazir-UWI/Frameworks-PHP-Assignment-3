<?php

namespace framework\class_interface;

interface Interface_EmployeeDashboardModel{
	public function getTasksById($taskid);														//returns array of a specific task
	public function getTasksAll($employeeid);													//returns all tasks assigned to employee
	public function updateTask($taskid, $title, $description, $status, $date);					//updates a task record
}   