
<?php
require_once 'connect.php';
if(ISSET($_POST['add'])){
    if($_POST['task_list'] != ""){
        $task = $_POST['task_list'];

        $conn->query("INSERT INTO `task_list` VALUES('', '$task', '')");
        header('location:index.php');
    }
}
?>