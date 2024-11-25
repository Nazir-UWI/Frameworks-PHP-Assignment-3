<?php

namespace framework\class_interface;

interface Interface_AdminDashboardModel{
    public function getAllUsers();                                              //returns an array of all users in the database
	public function createUser($username, $email, $password);                   //adds a new user to the user table
	public function assignRole($user_id, $role_ref_id);                         //assigns a userid with a role
	public function getAllTasks();                                              //returns an array of all tasks in the database
	public function deleteUser($user_id);                                       //deletes a user from the database
	public function getTaskStats();                                             //returns the total number of tasks and the number of tasks in each state
}   