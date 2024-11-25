<?php

namespace framework\class_interface;

interface Interface_EmployeeDashboardController{
    public function displayTasksHandler();                          //employee button, displays all tasks
    public function editTasksHandler();                             //employee button, shows the edit tasks form
    public function editTask();                                     //shows form that allows user to select which task to edit
    public function updateTask();                                   //updates selected task
}