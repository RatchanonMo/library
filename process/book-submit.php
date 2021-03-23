<?php
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
        $b_id = $_POST['b_id'];
        $s_id = $_POST['s_id'];
        $b_date = $_POST['b_date'];

        $sql = "UPDATE book SET
            s_id = '$s_id',
            b_date  = '$b_date'
            WHERE b_id = '$b_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:../student-library.php?status=1");
        }else{
            header("location:../student-library.php?status=2");
        }
    }


?>