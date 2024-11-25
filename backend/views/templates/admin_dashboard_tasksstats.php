<?php
    echo '<div class="col-9">';
    echo '<center> <h1>Display Task Statistics</h1> </center> ';
    echo '<hr>';
    echo '<br>';

    if (isset($data['num_tasks'])){
        echo '<table class="task-table">';
            echo "<tr>
                <th>Tasks</th>
                <th>Pending</th>
                <th>In Progress</th>
                <th>Completed</th>
            </tr>";
            echo "<tr>";
                echo "<td>{$data['num_tasks']}</td>";
                echo "<td>{$data['Pending']}</td>";
                echo "<td>{$data['In_Progress']}</td>";
                echo "<td>{$data['Completed']}</td>";
            echo "</tr>";
        echo "</table>";   
    }
    echo '</div>';
?>