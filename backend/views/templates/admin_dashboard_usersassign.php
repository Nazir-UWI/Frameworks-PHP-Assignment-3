<?php
    echo '<div class="col-9">';
    echo '<center> <h1>Assign Role</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    echo '<form method="POST" action="../admindashboard/assignrole">';

        echo '<label for="user_id"> <b>User ID</b> </label>';   
            echo '<select class = "input" name="user_id" id="user_id">';
                foreach ($data as $user => $info){
                    echo '<option value="'.$info['user_id'],'">'.$info['user_id'].'</option>';             
                }
                echo '</select>';

                if (isset($errors['user_id'])  && $errors['user_id'] !== " " ){
                    echo '<p class="errormsg" id="deleteUser-error">';
                    echo $errors['user_id'];
                    echo '</p>';
                }
                    echo '<br>';
        echo '<label for="role_ref_id"><b>Role</b></label>';
            echo '<select class = "input" name="role_ref_id" id="role_ref_id">';
            echo '<option value="1">Administrator</option>';
            echo '<option value="2">Manager</option>';
            echo '<option value="3">Employee</option>';
            echo '</select>';
                if (isset($errors['role_ref_id']) && $errors['role_ref_id'] !== " " ){
                    echo '<p class="errormsg" id="role_ref_id-error">';
                    echo $errors['role_ref_id'];
                    echo '</p>';
                }
                    echo '<br>';

        echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';
                    
        echo '<button type="submit" class="registerbtn">Submit</button>';

    echo '</form>';
    echo '</div>';
?>