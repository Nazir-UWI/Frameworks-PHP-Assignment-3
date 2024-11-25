<?php
    echo '<div class="col-9">';
    echo '<center> <h1>Create Users</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    echo '<form method="POST" action="../admindashboard/newuser">';

        echo '<label for="username"> <b>Username</b> </label>';   
            echo '<input class = "input" type="text" placeholder= "Enter Username" name="username" />';
                if (isset($errors['username'])  && $errors['username'] !== " " ){
                    echo '<p class="errormsg" id="username-error">';
                    echo $errors['username'];
                    echo '</p>';
                }
                    echo '<br>';
        echo '<label for="email"> <b>Email</b> </label>';   
            echo '<input class = "input" type="text" placeholder= "Enter Your Email" name="email" />';
                if (isset($errors['email'])  && $errors['email'] !== " " ){
                    echo '<p class="errormsg" id="email-error">';
                    echo $errors['email'];
                    echo '</p>';
                }
                    echo '<br>';
        echo '<label for="password"> <b>Password</b> </label>'; 
            echo '<input class = "input" type="password" placeholder= "Enter Your Password" name="password" />';
                if (isset($errors['password'])  && $errors['password'] !== " " ){
                    echo '<p class="errormsg" id="password-error">';
                    echo $errors['password'];
                    echo '</p>';
                }
                    echo '<br>';

        echo '<input type="hidden" name="csrf_token" value="'.$csrfToken.'">';

        echo '<button type="submit" class="registerbtn">Register</button>';

    echo '</form>';
    echo '</div>';

?>