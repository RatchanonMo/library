<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_POST['submit'])){
        $s_sid = $_POST['s_sid'];

        $sql = "SELECT * FROM student WHERE s_sid = '$s_sid'";
        $result = mysqli_query($conn,$sql);
        $row  = mysqli_fetch_array($result);
        if($row > 0){
            $_SESSION["s_id"] = $row["s_id"];
            $_SESSION["s_fname"] = $row["s_fname"];
            $_SESSION["s_name"] = $row["s_name"];
            $_SESSION["s_lname"] = $row["s_lname"];
            $_SESSION["s_sid"] = $row["s_sid"];
            $_SESSION["s_pic"] = $row["s_pic"];
            header("location:../student-library.php");
        }else{
            header("location:../index.php?status=1");
        }
    }


?>