<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="text-center">
        <h1>Login To DashBoard</h1>
    </div>
    <hr>
    <div class="container">
        <form action="functions/login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">UserName</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="user">
                <small id="user" class="form-text text-muted">We'll never share your username with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name ="pass">
            </div>
            <div class="text-center">
                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember ME</label>
                </div>
                
                <?php 
                    if(isset($_SESSION['status'])){
                        if($_SESSION['status'] == "passwrong"){
                            echo '<div class="alert alert-danger" role="alert">
                            Password wrong!!
                        </div>'; 
                        session_destroy();   
                        }else if($_SESSION['status'] == "userpasswrong"){
                            echo '<div class="alert alert-danger" role="alert">
                            User or password Wrong!!
                        </div>';
                        session_destroy();
                        }else if($_SESSION['status'] == "logined"){
                            header("Location: dashboard.php");
                        }else if($_SESSION['status'] == 'notlogin'){
                            echo '<div class="alert alert-danger" role="alert">
                            You not already login!!
                        </div>';
                        session_destroy();
                        }
                    }    
                    
                ?>
                <button type="submit" class="btn btn-primary btn-center">Submit</button>
            </div>
        </form>
    </div>
    </body>
    
</html>