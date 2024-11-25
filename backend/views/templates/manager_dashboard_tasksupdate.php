<?php

echo '<center> <h1>Edit Task</h1> </center> ';
echo '<hr>';
echo '<br>';

echo '<form method="POST" action="'.APP_ROOT_DIR.'/managerdashboard/updatetask">';

        echo '<input class = "input" type ="hidden" name="task_id" value="' . $data['task_id'] . '"/>';

    echo '<label for="title"> <b>Title</b> </label>';   
        echo '<input class = "input" type="text" placeholder= "Update Title" name="title" value="' . $data['title'] . '"/>';
            if (isset($errors['title']) && $errors['title'] !== " "){
                echo '<p class="errormsg" id="title-error">';
                echo $errors['title'];
                echo '</p>';
            }
            echo '<br>';
    echo '<label for="description"> <b>Description</b> </label>';   
        echo '<input class = "input" type="text" placeholder= "Update Description" name="description" value="' . $data['description'] . '"/>';
            if (isset($errors['description']) && $errors['description'] !== " "){
                echo '<p class="errormsg" id="description-error">';
                echo $errors['description'];
                echo '</p>';
            }
            echo '<br>';
    echo '<label for="status"><b>Status</b></label>';
        echo '<select class = "input" name="status">';
        //echo '<option value="1">Pending</option>';
        echo '<option value="2">In Progress</option>';
        echo '<option value="3">Completed</option>';
        echo '</select>';
            if (isset($errors['user_id'])  && $errors['user_id'] !== " "){
                echo '<p class="errormsg" id="editTasks-error">';
                echo $errors['user_id'];
                echo '</p>';
            }
                echo '<br>';

    echo '<label for="date"> <b>date</b> </label>';   
        echo '<input class = "input" style="width: 100%" type="date" name="date" value="' . $data['due_date'] . '"/>';
            if (isset($errors['date']) && $errors['date'] !== " "){
                echo '<p class="errormsg" id="date-error">';
                echo $errors['date'];
                echo '</p>';
            }
            echo '<br>';

    echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';

    echo '<button type="submit" class="registerbtn">Submit</button>';

echo '</form>';


?>