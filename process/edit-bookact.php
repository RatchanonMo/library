<?php
    include("../connect/connect.php");
    if($_POST['b_id'] == ''){
        header("location:../manage-book.php?status=3");
    }

    $b_id = $_POST['b_id'];
    $b_name = $_POST['b_name'];
    $b_write = $_POST['b_write'];
    $b_detail = $_POST['b_detail'];

    $temp = explode('.',$_FILES['b_pic']['name']);
    $newName = round(microtime(true)). '.'.end($temp) ;

    move_uploaded_file($_FILES['b_pic']['tmp_name'], '../upload/book/' .$newName);

    $sql = "UPDATE book SET
        b_name = '$b_name',
        b_write = '$b_write',
        b_detail = '$b_detail',
        b_pic = '$newName'
        WHERE b_id = '$b_id'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:../manage-book.php?status=4");
    }else{
        header("location:../manage-book.php?status=5");
    }

?>