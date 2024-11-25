<?php

namespace framework\class_abstract;

abstract class Abstract_Model{
    protected $db;

    public function __construct(){             //constructor
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$databasename = 'task_management_system';

		$this->db = new \mysqli($servername, $username, $password);      //create connection to server

		if ($this->db->connect_error) {                                       //check connection
			die("Connection failed\n" . $this->db->connect_error);
		}
		
		mysqli_select_db($this->db, $databasename);
	}

    public function closeDatabaseConnection (){        //close connection to database
		$this->db->close();
	}

    
}