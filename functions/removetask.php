<?php 
        include 'checklogin.php';
        include '../connect.php';
        
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM tasks WHERE id_task='$id' ";
            $status = $conn->exec($sql); 
            if($status){
                echo json_encode(array("status"=>"Thanh cong")); 
            }
        }
        
?>