<?php
    include("../connect/connect.php");
    if($_POST['s_id'] == ''){
        header("location:../manage-student.php?status=3");
    }

    $s_id = $_POST['s_id'];
    $s_fname = $_POST['s_fname'];
    $s_name = $_POST['s_name'];
    $s_lname = $_POST['s_lname'];
    $s_sid = $_POST['s_sid'];

    $temp = explode('.',$_FILES['s_pic']['name']);
    $newName = round(microtime(true)). '.'.end($temp) ;

    move_uploaded_file($_FILES['s_pic']['tmp_name'], '../upload/' .$newName);

    $sql = "UPDATE student SET
        s_fname = '$s_fname',
        s_name = '$s_name',
        s_lname = '$s_lname',
        s_sid = '$s_sid',
        s_pic = '$newName'
        WHERE s_id = '$s_id'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:../manage-student.php?status=4");
    }else{
        header("location:../manage-student.php?status=5");
    }

?>