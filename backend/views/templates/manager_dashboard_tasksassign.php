<?php

echo '<center> <h1>Assign Task</h1> </center> ';
echo '<hr>';
echo '<br>';

echo '<form method="POST" action="'.APP_ROOT_DIR.'/managerdashboard/assigntask">';

    echo '<label for="user_id"> <b>Employee</b> </label>';   
        echo '<select class = "input" name="user_id">';
            foreach ($data['users'] as $user => $info){
                echo '<option value="'.$info['user_id'],'">'.$info['user_id'].'</option>';             
            }
            echo '</select>';
            if (isset($errors['user_id']) && $errors['user_id'] !== " "){
                echo '<p class="errormsg" id="user_id-error">';
                echo $errors['user_id'];
                echo '</p>';
            }
                echo '<br>';
    echo '<label for="task_id"> <b>Task</b> </label>';   
        echo '<select class = "input" name="task_id">';
            foreach ($data['tasks'] as $user => $info){
                echo '<option value="'.$info['task_id'],'">'.$info['task_id'].'</option>';             
            }
            echo '</select>';

            if (isset($errors['task_id']) && $errors['task_id'] !== " "){
                echo '<p class="errormsg" id="assignTasks-error">';
                echo $errors['task_id'];
                echo '</p>';
            }
                echo '<br>';

    echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';

    echo '<button type="submit" class="registerbtn">Submit</button>';

echo '</form>';


?>