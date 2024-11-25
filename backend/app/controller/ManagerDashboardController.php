<?php

namespace app\controller;

class ManagerDashboardController extends \framework\class_abstract\Abstract_Controller implements \framework\class_interface\Interface_ManagerDashboardController{

    public function __construct(){
    }

    public function index(){
        $this->setPath('manager_dashboard.php');
        $this->display();
        return;
    }

    
    public function displayTasksHandler(){
        $this->setPath('manager_dashboard.php');
        $this->setAction('displayTasks');

        $this->display(); 
    }

    public function displayTasksAll(){
        $managerid = $this->getManagerId();

        $this->setPath('manager_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getTasksAll($managerid));
        $this->setErrors('displayTasks', 'No Tasks Found');

        $this->display(); 
    }

    public function displayTasksPending(){
        $managerid = $this->getManagerId();

        $this->setPath('manager_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getTasksPending($managerid));
        $this->setErrors('displayTasks', 'No Tasks Found');

        $this->display(); 
    }

    public function displayTasksInProgress(){
        $managerid = $this->getManagerId();

        $this->setPath('manager_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getTasksInProgress($managerid));
        $this->setErrors('displayTasks', 'No Tasks Found');

        $this->display(); 
    }

    public function displayTasksCompleted(){
        $managerid = $this->getManagerId();

        $this->setPath('manager_dashboard.php');
        $this->setAction('displayTasks');
        $this->setData($this->model->getTasksCompleted($managerid));
        $this->setErrors('displayTasks', 'No Tasks Found');

        $this->display();
    }


    public function assignTasksHandler(){
        $managerid = $this->getManagerId();

        $data['users'] = $this->model->getAllUsers();
        $data['tasks'] = $this->model->getTasksAll($managerid);

        if (!isset($data['users'][0]['user_id'])){
            $this->setErrors('user_id', 'No Users Found');

        }
        if (!isset($data['tasks'][0]['task_id'])){
            $this->setErrors('task_id', 'No Tasks Found');
        }

        $this->setPath('manager_dashboard.php');
        $this->setAction('assignTasks');
        $this->setData($data);

        $this->display();
    }

    public function assignTask(){
        $user_id = $this->cleanInput($_POST['user_id']);
        
        if (isset($_POST['task_id'])){
            $task_id = $this->cleanInput($_POST['task_id']);
        }else{
            $task_id = -1;
        }

        if ($this->model->assignTask($user_id, $task_id)){
            $this->setErrors("task_id", "Assigned Role Successfully");
        }else{
            $this->setErrors("task_id", "Failed to Assign Role");
        }
        
        $this->assignTasksHandler();
    }


    public function editTasksHandler(){
        $managerid = $this->getManagerId();

        $this->setPath('manager_dashboard.php');
        $this->setAction('editTasksShow');
        $this->setData($this->model->getTasksAll($managerid));
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

        $this->setPath('manager_dashboard.php');
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


    public function createTaskHandler(){
        $data = $this->model->getAllUsers();

        if (!isset($data['users'][0]['user_id'])){
            $this->setErrors('user_id', 'No Users Found');
        }

        $this->setPath('create_task.php');
        $this->setAction('createTasks');
        $this->setData($data);

        $this->display();
    }

    public function createTask(){
        $managerid = $this->getManagerId();

        $title = $this->cleanInput($_POST['title']);
        $description = $this->cleanInput($_POST['description']);
        $status = $this->cleanInput($_POST['status']);
        $assignedto = $this->cleanInput($_POST['assigned_to']);
        $date = $this->cleanInput($_POST['date']);

        if ($this->validateUpdateTask($title, $description, $date)){
            $this->model->createTask($title, $description, $status, $assignedto, $managerid, $date);
        }
        $this->createTaskHandler();
    }

    private function getManagerId(){                                //helper function to retireve the id of the current logged in manager                     
        \framework\session_manager\sessionManager::start();     

        if (isset($_SESSION["Current_User"])){
            $managerid = $_SESSION["Current_User"];
        }else{
            $managerid = -1;
        }

        return $managerid;
    }


    private function validateUpdateTask($title, $description, $date){       //helper function for updateTask()
		$valid = true;

		if (empty($title)){											            //Validate username
            $this->setErrors('title', 'Title required');
			$valid = false;
		}
		
		if (empty($description)){												//Validate description
            $this->setErrors('description', 'Description required');
			$valid = false;
		}

        if (empty($date)){												        //Validate email
            $this->setErrors('date', 'Date required');
			$valid = false;
		}

		return $valid;
	}
    

    

}