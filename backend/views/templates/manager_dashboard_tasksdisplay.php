<?php
echo '<center> <h1>Display Users</h1> </center> ';
echo '<hr>';
echo '<br>';

echo '<div class="manager_tasks_buttons">';                                                                                                                    //Task Buttons
    echo '<a href="'.APP_ROOT_DIR.'/managerdashboard/tasks/all">Display All</a>'; 
    echo '<a href="'.APP_ROOT_DIR.'/managerdashboard/tasks/pending">Display Pending</a>'; 
    echo '<a href="'.APP_ROOT_DIR.'/managerdashboard/tasks/inprogress">Display In Progress</a>'; 
    echo '<a href="'.APP_ROOT_DIR.'/managerdashboard/tasks/completed">Display Completed</a>'; 
echo '</div>';                                                                                                                    


echo '<br>';

if (isset($data[0]['task_id'])) {
    echo '<table class="task-table">';
    echo '    <thead>';
    echo '        <tr>';
    echo '            <th>Task ID</th>';
    echo '            <th>Title</th>';
    echo '            <th>Description</th>';
    echo '            <th>Status</th>';
    echo '            <th>Assigned To</th>';
    echo '            <th>Created By</th>';
    echo '            <th>Due Date</th>';
    echo '        </tr>';
    echo '    </thead>';
    echo '    <tbody>';
    foreach ($data as $task => $info) {
        echo '        <tr>';
        echo '            <td>' . htmlspecialchars($info['task_id']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['title']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['description']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['status']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['assigned_to']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['created_by']) . '</td>';
        echo '            <td>' . htmlspecialchars($info['due_date']) . '</td>';
        echo '        </tr>';
    }
    echo '    </tbody>';
    echo '</table>';
} elseif (isset($errors['displayTasks']) && $errors['displayTasks'] !== " ") {
    echo '<p class="errormsg">' . htmlspecialchars($errors['displayTasks']) . '</p>';
}



?>