<?php

echo '<center> <h1>Edit Task</h1> </center> ';
echo '<hr>';
echo '<br>';

echo '<form method="POST" action="'.APP_ROOT_DIR.'/managerdashboard/edittask">';

    echo '<label for="task_id"> <b>Task</b> </label>';   
        echo '<select class = "input" name="task_id">';
            foreach ($data as $user => $info){
                echo '<option value="'.$info['task_id'],'">'.$info['task_id'].'</option>';             
            }
            echo '</select>';

            if (!isset($data[0]['task_id']) && isset($errors['task_id'])){
                echo '<p class="errormsg" id="assignTasks-error">';
                echo $errors['task_id'];
                echo '</p>';
            }
                echo '<br>';

    echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';

    echo '<button type="submit" class="registerbtn">Submit</button>';

echo '</form>';


?>