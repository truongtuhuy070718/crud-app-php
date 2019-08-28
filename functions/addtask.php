<?php 
    include 'checklogin.php';
    include '../connect.php';
    $taskname = $_POST['taskname'];
    $deadline = $_POST['deadline'];
    $sql = "INSERT INTO tasks(name, deadline) VALUES('$taskname', '$deadline')";
    $status = $conn->exec($sql);   
    if($status){
        $_SESSION['success'] = "success";
        header("Location: ../dashboard.php ");
    }else{
        $_SESSION['fail'] = "fail"; 
    }
?>