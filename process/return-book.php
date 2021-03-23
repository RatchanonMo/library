<?php
    session_start();
    include("../connect/connect.php");
        $b_id = $_POST['b_id'];
                                
                                   
                                    $sql = "UPDATE book
                                    SET s_id = '0',
                                        b_date = '0'
                                    WHERE b_id = '$b_id'
                                    ";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        header("location:../result-book.php?status=1");
                                    }else{
                                        header("location:../result-book.php?status=2");
                                    }
                           

							
        
    
?>
