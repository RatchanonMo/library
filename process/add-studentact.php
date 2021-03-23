<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
        $s_fname = $_POST['s_fname'];
        $s_name = $_POST['s_name'];
        $s_lname = $_POST['s_lname'];
        $s_sid = $_POST['s_sid'];
        $temp = explode('.',$_FILES['s_pic']['name']);
        $newName = round(microtime(true)). '.'.end($temp) ;

        move_uploaded_file($_FILES['s_pic']['tmp_name'], '../upload/' .$newName);

        $sql = "INSERT INTO `student` (`s_id`, `s_fname`, `s_name`, `s_lname`, `s_sid`, `s_pic`, `b_id`, `b_price`, `s_date`) 
        VALUES (NULL, '$s_fname', '$s_name', '$s_lname', '$s_sid', '".$newName."', '0', '0', '0')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../manage-student.php?status=1");
        }else{
            header("location:../manage-student.php?status=2");
        }

    }


?>