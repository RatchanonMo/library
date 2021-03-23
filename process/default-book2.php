<?php
    session_start();
    include("../connect/connect.php");
    if(isset($_GET['id'])){
        $b_id = $_GET['id'];
        $sql = "SELECT * FROM book WHERE b_id = '$b_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

       
        
      		
                                $return_date     = $row['b_date'];        
                                $today            = date('Y-m-d');   
                                $pay = 0;
                                $day_late_qty = 0;
                                if($today > $return_date){
                                    $time_today = strtotime($today);        
                                    $time_return = strtotime($return_date);    
                                    $day_late_qty = ($time_today - $time_return) / ( 60 * 60 * 24 );
                                    $pay = ceil($day_late_qty) *5;
                                    echo '<br>';
                                    
                                    
                                    
                                    $sql = "UPDATE book
                                    SET s_id = '0',
                                        b_date = '0'
                                    WHERE b_id = '$b_id'
                                    ";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        header("location:../result-mybook.php?status=3");
                                        $_SESSION['batth'] = $pay ;
                                        $_SESSION['day'] = $day_late_qty;
                                        $_SESSION['b_id'] = $row['b_id'] ;

                                    }else{
                                        header("location:../result-mybook.php?status=2");
                                    }
                                    
                                   
                                    
                                }
                                else{
                                    echo 'no price';
                                    $sql = "UPDATE book
                                    SET s_id = '0',
                                        b_date = '0'
                                    WHERE b_id = '$b_id'
                                    ";
                                    $result = mysqli_query($conn,$sql);
                                    if($result){
                                        header("location:../result-mybook.php?status=1");
                                    }else{
                                        header("location:../result-mybook.php?status=2");
                                    }
                                }

							
        
    }
?>
