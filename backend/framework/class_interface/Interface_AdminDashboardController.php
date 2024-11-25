<?php

namespace framework\class_interface;

interface Interface_AdminDashboardController{
    public function displayUsersHandler();                      //admin button, displays all users
    public function createUserHandler();                        //admin button, shows the create user form
    public function createUser();                               //creates a new user in the database
    public function deleteUserHandler();                        //admin button, shows the delete user form
    public function deleteUser();                               //deletes a user from the database
    public function assignRoleHandler();                        //admin button, shows the assign role form
    public function assignRole();                               //assigns a role to a user in the database
    public function displayTasksHandler();                      //admin button, displays all tasks in the database
    public function displayTaskStatsHandler();                  //admin button, displays the statistics for all tasks
}