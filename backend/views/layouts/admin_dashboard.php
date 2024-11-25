<?php
    \framework\session_manager\AuthenticationGuard::redirectIfNotAuthenticated('admin');  
    $title = "Admins";
    
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;

    require_once PARTIALS_DIR."/header.php";
?>

<div class="topnav"> 
    <a href=<?php echo APP_ROOT_DIR."/"?>>Home</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/users"?>>Display Users</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/newuser"?>>Create User</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/deleteuser"?>>Delete User</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/assignrole"?>>Assign Roles</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/displaytasks"?>>Display Tasks</a>
    <a href=<?php echo APP_ROOT_DIR."/admindashboard/taskstats"?>>Task Stats</a>
</div>

<div class="container"> 
            <center> <h1>Admin Dashboard</h1> </center>
            <hr style="height: 0px; border: 3px solid #f1f1f1;">
            <br>
             
<?php

    if (!isset($action[0])){
        $action[0] = "";
    }

    switch ($action[0]){
        case "displayUsers":
            require_once TEMPLATES_DIR."/admin_dashboard_usersdisplay.php";
            break;
        case "createUser":
            require_once TEMPLATES_DIR."/admin_dashboard_userscreate.php";
            break;
        case "deleteUser":
            require_once TEMPLATES_DIR."/admin_dashboard_usersdelete.php";
            break;
        case "assignRole":
            require_once TEMPLATES_DIR."/admin_dashboard_usersassign.php";
            break;
        case "displayTasks":
            require_once TEMPLATES_DIR."/admin_dashboard_tasksdisplay.php";
            break;
        case "displayTaskStats":
            require_once TEMPLATES_DIR."/admin_dashboard_tasksstats.php";
            break;
        default:
        
    }
     
?>
  
</div> 
  
</body>  
</html> 