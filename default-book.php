<?php
    include("connect/connect.php");
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
                                    echo '<div class="col-xl-12 text-center text-indigo">';
                                    
                                    echo $pay;
                                    echo '</div>';
                                   
                                    
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
                                        header("location:../result-book.php?status=1");
                                    }else{
                                        header("location:../result-book.php?status=2");
                                    }
                                }

							
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include_once("component/header.php");
?>


<body class="s1" >
    
<script type="text/javascript">
/*
    //onload show modal script ชุดนี้โหลดมาตรงๆ ไม่มีหน่วงเวลานะ
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
    */
	
//เรีกยก modal ออกมาแสดง	
var show = function(){
    $('#myModal').modal('show');
};
 
/* กำหนดเวลาหลังเปิดหน้าเว็บ ว่าจะให้แสดงหลังโหลดหน้าเว็บแล้วกี่วินาที  เช่น 2000 = 2 วิ */
$(window).load(function(){
    var timer = window.setTimeout(show,2000);
});
 
</script>
</head>
<body>
 
<!-- title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 align="center"> devbanban.com </h2>
    </div>
  </div>
</div>
 
<!-- modal -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-sm"> <!-- กำหนดขนาดของ modal เพิ่มได้นะครับ เช่น xs, sm, md, lg -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"> devbanban.com </h4>
      </div>
      <div class="modal-body">
        <p>ข้อความ..... </p>
		
		เนื้อหา, รุปภาพ ฯลฯ
		หรือเอาไปประยุกต์ใช้กับอะไรก็ได้ครับ
 
 
        <br>
      </div>
    </div>
  </div>
  
   



      
          





    

        




    <?php
        include_once("component/jslink.php");
    ?>   
</body>
</html>