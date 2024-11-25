<?php
    \framework\session_manager\AuthenticationGuard::redirectIfNotAuthenticated('manager');  
    $title = "Managers";
    
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;

    require_once PARTIALS_DIR."/header.php";
?>

<div class="topnav"> 
    <a href=<?php echo APP_ROOT_DIR."/"?>>Home</a>
    <a href=<?php echo APP_ROOT_DIR."/managerdashboard/tasks"?>>Display Tasks</a>
    <a href=<?php echo APP_ROOT_DIR."/managerdashboard/assigntask"?>>Assign Tasks</a>
    <a href=<?php echo APP_ROOT_DIR."/managerdashboard/edittask"?>>Edit Tasks</a>
    <a href=<?php echo APP_ROOT_DIR."/managerdashboard/newtask"?>>Create Tasks</a>
</div>

<div class="container"> 
            <div class="col-9">
            <center> <h1>Manager Dashboard</h1> </center>
            <hr style="height: 0px; border: 3px solid #f1f1f1;">
            <br>
             
<?php 

    if (!isset($action[0])){
        $action[0] = "";
    }

    switch ($action[0]){
        case "displayTasks":
            require_once TEMPLATES_DIR."/manager_dashboard_tasksdisplay.php";
            break;
        case "assignTasks":
            require_once TEMPLATES_DIR."/manager_dashboard_tasksassign.php";
            break;
        case "editTasksShow":
            require_once TEMPLATES_DIR."/manager_dashboard_tasksedit.php";
            break;
        case "editTasks":
            require_once TEMPLATES_DIR."/manager_dashboard_tasksupdate.php";
            break;         
        default:
        
    }

?>


</div> 
  
</body>  
</html> 