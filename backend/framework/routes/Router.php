<?php

namespace framework\routes;

class Router{
    private $controller;
    private $controllerMethod;
    private $model;

    private $routes = [
        '/' => [ 
            'controller' => 'IndexController',
            'model' => 'IndexModel',
            'GET' => 'index',
            // 'POST' => 'index'
        ],
        '/register' => [ 
            'controller' => 'RegisterController',
            'model' => 'RegisterModel',
            'GET' => 'index',
            'POST' => 'newUser'
        ],
        '/login' => [ 
            'controller' => 'LoginController',
            'model' => 'LoginModel',
            'GET' => 'index',
            'POST' => 'newLogin'
        ],
        '/admindashboard' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'index',
            // 'POST' => 'index'
        ],
        '/admindashboard/users' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'displayUsersHandler',
            // 'POST' => 'displayUsers'
        ],
        '/admindashboard/newuser' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'createUserHandler',
            'POST' => 'createUser'
        ],
        '/admindashboard/deleteuser' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'deleteUserHandler',
            'POST' => 'deleteUser'
        ],
        '/admindashboard/assignrole' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'assignRoleHandler',
            'POST' => 'assignRole'
        ],
        '/admindashboard/displaytasks' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'displayTasksHandler',
            //'POST' => 'displayTasksHandler'
        ],
        '/admindashboard/taskstats' => [ 
            'controller' => 'AdminDashboardController',
            'model' => 'AdminDashboardModel',
            'GET' => 'displayTaskStatsHandler',
            //'POST' => 'displayTaskStatsHandler'
        ],
        '/managerdashboard' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'index',
            //'POST' => 'index'
        ],
        '/managerdashboard/tasks' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'displayTasksHandler',
            //'POST' => 'index'
        ],
        '/managerdashboard/tasks/all' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'displayTasksAll',
            //'POST' => 'index'
        ],
        '/managerdashboard/tasks/pending' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'displayTasksPending',
            //'POST' => 'index'
        ],
        '/managerdashboard/tasks/inprogress' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'displayTasksInProgress',
            //'POST' => 'index'
        ],
        '/managerdashboard/tasks/completed' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'displayTasksCompleted',
            //'POST' => 'index'
        ],
        '/managerdashboard/assigntask' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'assignTasksHandler',
            'POST' => 'assignTask'
        ],
        '/managerdashboard/edittask' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'editTasksHandler',
            'POST' => 'editTask'
        ],
        '/managerdashboard/updatetask' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'editTasksHandler',
            'POST' => 'updateTask'
        ],
        '/managerdashboard/newtask' => [ 
            'controller' => 'ManagerDashboardController',
            'model' => 'ManagerDashboardModel',
            'GET' => 'createTaskHandler',
            'POST' => 'createTask'
        ],
        '/employeedashboard' => [ 
            'controller' => 'EmployeeDashboardController',
            'model' => 'EmployeeDashboardModel',
            'GET' => 'index',
            //'POST' => 'index'
        ],
        '/employeedashboard/tasks' => [ 
            'controller' => 'EmployeeDashboardController',
            'model' => 'EmployeeDashboardModel',
            'GET' => 'displayTasksHandler',
            //'POST' => 'index'
        ],
        '/employeedashboard/edittask' => [ 
            'controller' => 'EmployeeDashboardController',
            'model' => 'EmployeeDashboardModel',
            'GET' => 'editTasksHandler',
            'POST' => 'editTask'
        ],
        '/employeedashboard/updatetask' => [ 
            'controller' => 'EmployeeDashboardController',
            'model' => 'EmployeeDashboardModel',
            'GET' => 'editTasksHandler',
            'POST' => 'updateTask'
        ],


    ];

    

    public function __construct(){
    }

        
    public function route($path, $httpMethod){

        $separators = ['/', '\\'];

        foreach ($this->routes as $route => $info){
                                                                            
            $route = str_replace($separators, DIRECTORY_SEPARATOR, $route);         // change the directory separators in the route keys to match the OS director separator

            if ($path === $route){
                $this->controller = $info['controller'];
                $this->model = $info['model'];
                $this->controllerMethod = $info[$httpMethod];
                    
                return true;
            }
        }
        return false;
    }
    

    public function getController(){
		return $this->controller;
	}
    public function getControllerMethod(){
		return $this->controllerMethod;
	}
    public function getModel(){
		return $this->model;
	}



}