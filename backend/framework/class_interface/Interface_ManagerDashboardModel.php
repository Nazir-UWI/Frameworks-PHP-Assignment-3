<?php

namespace framework\class_interface;

interface Interface_ManagerDashboardModel{
	public function getAllUsers();																//returns array of all users
	public function getTasksById($taskid);														//returns array of a specific task
	public function getTasksAll($managerid);													//returns all tasks created by manager
	public function getTasksPending($managerid);												//returns all pending tasks created by maanger
	public function getTasksInProgress($managerid);												//returns all in progress tasks created by manager
	public function getTasksCompleted($managerid);												//returns all completed tasks created by manager
	public function assignTask($user_id, $task_id);												//updates the assigned user id of a task
	public function updateTask($taskid, $title, $description, $status, $date);					//updates a task record
	public function createTask($title, $description, $status, $assignedto, $createdby, $date);	//creates a new task
}   