<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
        $b_name = $_POST['b_name'];
        $b_write = $_POST['b_write'];
        $b_detail = $_POST['b_detail'];
        $temp = explode('.',$_FILES['b_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;

        move_uploaded_file($_FILES['b_pic']['tmp_name'], '../upload/book/' .$newName);

        $sql = "INSERT INTO `book` (`b_id`, `b_name`, `b_write`, `b_detail`, `b_pic`, `s_id`) 
        VALUES (NULL, '$b_name', '$b_write', '$b_detail', '".$newName."', '0')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../manage-book.php?status=1");
        }else{
            header("location:../manage-book.php?status=2");
        }
    }


?>