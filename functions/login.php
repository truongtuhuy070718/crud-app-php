
<?php 
session_start();
include '../connect.php';
$user = $_POST['user'];
$pass = $_POST['pass'];
$stmt = $conn->prepare("SELECT username, password From users");
$stmt->execute();
$data = $stmt->fetchAll();

for($i = 0; $i < count($data); $i++){
    if($user == $data[$i][0]){
        if($pass == $data[$i][1]){
            $_SESSION['status'] = "logined";
            $_SESSION['username'] = $user;
            $name = 
            header("Location: ../dashboard.php");
            break;
        }else{
            $_SESSION['status'] = "passwrong";
            header("Location: ../login.php");
        };
    }else{
        $_SESSION['status'] = "userpasswrong";
            header("Location: ../login.php");
    };
}