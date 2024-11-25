<?php
    echo '<div class="col-9">';
    echo '<center> <h1>Display Users</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    if (isset($data[0]['user_id'])) {
        echo '<table class="task-table">';
        echo '    <thead>';
        echo '        <tr>';
        echo '            <th>User ID</th>';
        echo '            <th>Username</th>';
        echo '            <th>Email</th>';
        echo '            <th>Password</th>';
        echo '        </tr>';
        echo '    </thead>';
        echo '    <tbody>';
        foreach ($data as $user => $info) {
            echo '        <tr>';
            echo '            <td>' . htmlspecialchars($info['user_id']) . '</td>';
            echo '            <td>' . htmlspecialchars($info['username']) . '</td>';
            echo '            <td>' . htmlspecialchars($info['email']) . '</td>';
            echo '            <td>' . htmlspecialchars($info['password']) . '</td>';
            echo '        </tr>';
        }
        echo '    </tbody>';
        echo '</table>';
    } else {
        echo '<p class="errormsg">' . htmlspecialchars($errors['displayUsers']) . '</p>';
    }

    echo '</div>';

?>