<?php
session_start();
include '../db.php';
include '../classes/Task.php';
if (isset($_POST['task_completed']))
{
    $task_id = $_POST['task_id'];
    $task = new Task($conn);
    $task->completeTask($task_id);
}
?>