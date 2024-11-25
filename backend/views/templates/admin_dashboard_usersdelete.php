<?php
    echo '<div class="col-9">';
    echo '<center> <h1>Delete User</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    echo '<form method="POST" action="../admindashboard/deleteuser">';
        echo '<label for="user_id"> <b>User ID</b> </label>';   
            echo '<select class = "input" name="user_id" id="user_id">';
        
                foreach ($data as $user => $info){
                    echo '<option value="'.$info['user_id'],'">'.$info['user_id'].'</option>';             
                }
                echo '</select>';

                if (isset($errors['deleteUser'])  && $errors['deleteUser'] !== " " ){
                    echo '<p class="errormsg" id="deleteUser-error">';
                    echo $errors['deleteUser'];
                    echo '</p>';
                }
                    echo '<br>';

        echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';  
            
        echo '<button type="submit" class="registerbtn">Submit</button>';

    echo '</form>';
    echo '</div>';

?>