<?php 
    include 'checklogin.php';
    include '../connect.php';
    $taskname = $_POST['taskname'];
    $deadline = $_POST['deadline'];
    $id = $_POST['id'];
    $sql = "UPDATE tasks set name = '$taskname' ,deadline = '$deadline' WHERE id_task = '$id'";
    $status = $conn->exec($sql);
    if($status){
        $_SESSION['update'] = "success";
        header("Location: ../dashboard.php ");
    }else{
        $_SESSION['update'] = "fail"; 
    }
?>