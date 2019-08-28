<?php
    include 'functions/checklogin.php';
    include 'connect.php';
    $stmt = $conn->prepare("SELECT id_task, name, deadline FROM tasks"); 
    $stmt->execute();
    $data = $stmt->fetchAll();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <title>dashboard</title>  
</head>
<body>
    <span><-]</span><a href="functions/logout.php"><?php echo $_SESSION['username']; ?> Logout</a>
    <hr>
        <div class="text-center">
            <h4>CRUD - DashBoard - todo List</h4>
        </div>
    <hr>
    <div class="container">
        <form action="functions/addtask.php" method="post">
            <div class="row">
                <div class="col-sm-9">
                    <input class="form-control" name="taskname" type="text" placeholder="Enter Task"  required> 
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary btn-block">Add Task</button>
                </div>
            </div>
            <div class="row">
                <label for="example-date-input" class="col-2 col-form-label text-danger">DeadLine:</label>
            </div>
            <div class="form-group row mt-0">   
                <div class="col-sm-9">
                    <input class="form-control" type="date" value="2019-08-29" id="example-date-input" name="deadline" required>
                </div> 
                <?php
                    if(isset($_SESSION['success'])){
                        if($_SESSION['success'] == "success"){
                            echo '<div class="alert alert-success col-sm-2" role="alert">
                                Add Task Successfully!!
                            </div>';
                            unset($_SESSION['success']);
                        }else if($_SESSION['fail'] == "fail"){
                            echo '<div class="alert alert-danger col-sm-2" role="alert">
                                Add Fail!!
                            </div>';
                            unset($_SESSION['fail']);
                        }
                    }           
                ?>               
            </div>
        </form>        
        <hr>
        <table class="table">

            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Task_Name</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                for($i = 0; $i < count($data); $i++){ ?>
                    <tr id="row<?php echo $data[$i][0] ?>">
                        <th><?php echo $data[$i][0] ?></th>
                        <td><?php echo $data[$i][1] ?></td>
                        <td><?php echo $data[$i][2] ?></td>
                        <td>
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo 'modal'.$data[$i][0] ?>" value ="<?php echo $data[$i][0] ?>">EDIT</button>                                    
                            <button type="button" class="btn btn-danger remove" value ="<?php echo $data[$i][0] ?>">Remove</button>
                        </td>
                    </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo 'modal'.$data[$i][0]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="<?php echo 'modal'.$data[$i][0]?>"><?php echo "Task".$data[$i][0] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="functions/updatetask.php" method="post">
                                <div class="modal-body">
                                <label for="recipient-name" class="col-form-label">ID:</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?php echo $data[$i][0] ?>" name="id" readonly>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name-Task:</label>
                                        <input type="text" class="form-control" id="recipient-name" value="<?php echo $data[$i][1] ?>" name="taskname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Deadline:</label>
                                        <input class="form-control" type="date" value="2019-08-29" id="example-date-input" name="deadline" required>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                <?php }
            ?>
            </tbody>
        </table>
    </div>
    
</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/myjs.js"></script>
</html>