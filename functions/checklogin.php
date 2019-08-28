<?php
    session_start();
    if(isset($_SESSION['status'])){
        if($_SESSION['status'] != 'logined'){
            header("Location: login.php");
        }
    }else{
        $_SESSION['status'] = 'notlogin';
        header("Location: login.php");
    }
?>