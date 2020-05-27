
<?php
require_once 'connect.php';

if($_GET['task_id'] != ""){
    $task_id = $_GET['task_id'];

    $conn->query("UPDATE `task_list` SET `status` = 'Done' WHERE `task_id` = $task_id") or die(mysqli_errno());
    header('location: index.php');
}
?>