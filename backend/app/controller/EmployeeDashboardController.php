<?php

namespace app\controller;

class EmployeeDashboardController extends \framework\class_abstract\Abstract_Controller implements \framework\class_interface\Interface_EmployeeDashboardController{

    public function __construct(){
    }

    public function index(){
        $this->setPath('employee_dashboard.php');
        $this->display();
        return;
    }

    public function displayTasksHandler(){
        $employeeid = $this->getEmployeeId();

        $this->setPath('employee_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getTasksAll($employeeid));
        $this->setErrors('displayTasks', 'No Tasks Found');

        $this->display();
    }

    public function editTasksHandler(){
        $employeeid = $this->getEmployeeId();

        $this->setPath('employee_dashboard.php');
        $this->setAction('editTasksShow');
        $this->setData($this->model->getTasksAll($employeeid));
        $this->setErrors('task_id', 'No Tasks Found');

        $this->display();
    }

    public function editTask(){
        if (isset($_POST['task_id'])){
            $taskid = $this->cleanInput($_POST['task_id']);
        }else{
            $taskid = -1;
        }

        $this->setAction('editTasks');
        $data = $this->model->getTasksById($taskid);

        if (!isset($data['task_id'])){
            $data = [];
            $this->setAction('editTasksShow');
            $this->setData($data);
            $this->setErrors('task_id', 'No Tasks Found');
        }

        $this->setPath('employee_dashboard.php');
        $this->setData($data);
        $this->display();
    }

    public function updateTask(){

        $taskid = $this->cleanInput($_POST['task_id']);
        $title = $this->cleanInput($_POST['title']);
        $description = $this->cleanInput($_POST['description']);
        $status = $this->cleanInput($_POST['status']);
        $date = $this->cleanInput($_POST['date']);

        if ($this->validateUpdateTask($title, $description, $date)){
            $this->model->updateTask($taskid, $title, $description, $status, $date);
        }
        $this->editTasksHandler();
    }


    private function getEmployeeId(){                                                             
        \framework\session_manager\sessionManager::start();     

        if (isset($_SESSION["Current_User"])){
            $employeeid = $_SESSION["Current_User"];
        }else{
            $employeeid = -1;
        }

        return $employeeid;
    }

    private function validateUpdateTask($title, $description, $date){
		$valid = true;

		if (empty($title)){											//Validate username
            $this->setErrors('title', 'Title required');
			$valid = false;
		}
		
		if (empty($description)){												//Validate email
            $this->setErrors('description', 'Description required');
			$valid = false;
		}

        if (empty($date)){												//Validate email
            $this->setErrors('date', 'Date required');
			$valid = false;
		}

		return $valid;
	}

    
    

    

}