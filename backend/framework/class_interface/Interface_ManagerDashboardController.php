<?php

namespace framework\class_interface;

interface Interface_ManagerDashboardController{
    public function displayTasksHandler();                          //manager button, displays buttons to filter and display tasks
    public function displayTasksAll();                              //displays all tasks
    public function displayTasksPending();                          //displays pending tasks
    public function displayTasksInProgress();                       //displays in progress tasks
    public function displayTasksCompleted();                        //displays completed tasks
    public function assignTasksHandler();                           //manager button, shows the assign tasks form
    public function assignTask();                                   //assigns a role to a userid
    public function editTasksHandler();                             //manager button, shows the edit tasks form
    public function editTask();                                     //shows form that allows user to select which task to edit
    public function updateTask();                                   //updates selected task
    public function createTaskHandler();                            //manager button, show the create task form
    public function createTask();                                   //creates the task in the database
}