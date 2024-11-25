<?php
    \framework\session_manager\AuthenticationGuard::redirectIfNotAuthenticated('manager');  
    $title = "Managers";

    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;

    require_once PARTIALS_DIR."/header.php";
?>

<div class="topnav"> 
    <a href=<?php echo APP_ROOT_DIR."/managerdashboard"?>>Manager Dashboard</a>
</div>

<div class="container"> 
            <div class="col-9">
            <center> <h1>Create Task Page</h1> </center>
            <hr style="height: 0px; border: 3px solid #f1f1f1;">
            <br>
             
<?php 

if (isset($action[0]) && $action[0] == 'createTasks'){
    echo '<center> <h1>Create Task</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    echo '<form method="POST" action="'.APP_ROOT_DIR.'/managerdashboard/newtask">';

        echo '<label for="title"> <b>Title</b> </label>';   
            echo '<input class = "input" type="text" placeholder= "Update Title" name="title" />';
                if (isset($errors['title']) && $errors['title'] !== " "){
                    echo '<p class="errormsg" id="title-error">';
                    echo $errors['title'];
                    echo '</p>';
                }
                echo '<br>';
        echo '<label for="description"> <b>Description</b> </label>';   
            echo '<input class = "input" type="text" placeholder= "Update Description" name="description" />';
                if (isset($errors['description']) && $errors['description'] !== " "){
                    echo '<p class="errormsg" id="description-error">';
                    echo $errors['description'];
                    echo '</p>';
                }
                echo '<br>';
        echo '<label for="status"><b>Status</b></label>';
            echo '<select class = "input" name="status" id="status">';
            echo '<option value="1">Pending</option>';
            echo '<option value="2">In Progress</option>';
            echo '<option value="3">Completed</option>';
            echo '</select>';
                    echo '<br>';
        echo '<label for="user_id"> <b>Assigned To</b> </label>';   
            echo '<select class = "input" name="assigned_to">';
                foreach ($data as $user => $info){
                    echo '<option value="'.$info['user_id'],'">'.$info['user_id'].'</option>';             
                }
                echo '</select>';
                if (isset($errors['assigned_to']) && $errors['assigned_to'] !== " "){
                    echo '<p class="errormsg" id="assigned_to-error">';
                    echo $errors['assigned_to'];
                    echo '</p>';
                }
                    echo '<br>';
        echo '<label for="date"> <b>date</b> </label>';   
            echo '<input class = "input" style="width: 100%" type="date" name="date" />';
                if (isset($errors['date']) && $errors['date'] !== " "){
                    echo '<p class="errormsg" id="date-error">';
                    echo $errors['date'];
                    echo '</p>';
                }
                echo '<br>';

        echo '<button type="submit" class="registerbtn">Submit</button>';

    echo '</form>';


    }

        
?>


    




</div> 
  
</body>  
</html> 