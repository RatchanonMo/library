<?php
    session_start();
    include("connect/connect.php");
    if(!$_SESSION['s_id']){
		header('Location:index.php?status=2');
	}else{

?>
<!DOCTYPE html>
<html lang="en">
<?php
    include_once("component/header.php");
?>


<body class="s1" >
    <!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        
        <?php
            include_once('component/navbar.php')
        ?>

        <?php
            include_once('component/slidebar.php')
        ?>
		

		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header s12">ระบบห้องสมุด<small>&nbsp;โรงเรียนยุพราชวิทยาลัย</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading ">
					<h4 class="panel-title">รายชื่อหนังสือในห้องสมุด</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
				<?php
						if(isset($_GET['status'])){
							$status = $_GET['status'];
							if($status == '1'){
					?>
					<div class="alert alert-green text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; คืนหนังสือแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
					<?php }else if($status == '2'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามรถคืนหนังสือได้ !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
				
					<?php }else if($status == '3'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; เกินกำหนด  <?php echo $_SESSION['day']; ?> วัน | กรุณาชำระเงิน <?php echo $_SESSION['batth']; ?> บาท</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
							
						</div> 
					</div>

					<?php }else if($status == '4'){?>
					<div class="alert alert-green text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; แก้ไขหนังสือแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
					<?php }else if($status == '5'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามารถแก้ไขหนังสือได้ !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
					<?php }?>
					<?php }?>
                        
                    <?php
                        $sql = "SELECT * FROM book WHERE s_id = '$_SESSION[s_id]'";
                        $query = mysqli_query($conn,$sql);
                        $book  = mysqli_num_rows($query);
                       
                       
                        
                        
                        echo '<div class="table-responsive">';
							echo'<table class="table table-striped m-b-0 text-center s9" id="data-table-default">';
							echo'<thead>';
							echo'<tr class="fw-700">';
							echo'<th width="400px">รูปภาพ</th>';
                            echo'<th width="400px">ชื่อหนังสือ</th>';
							echo'<th width="400px">ผู้แต่ง</th>';
							
							echo'<th width="200px">สถานะ</th>';
						
							echo'<th width="200px" >คืน</th>';
							
							echo'</tr>';
							echo'</thead>';
							echo'<tbody>';
                    while($row = mysqli_fetch_array($query)){
                        
						echo'<tr>';
							echo"<td><img src=upload/book/$row[b_pic] class='img-fluid' width='40%'></td>";
                            echo'<td>' .$row['b_name'].'</td>';
							echo'<td>' .$row['b_write']. '</td>';
							$date36 = new DateTime($row['b_date']);
							$date22 = $date36->diff(new DateTime('NOW'));
                            $check =  $date22->days;

                        
                            $bath = 5;
                            
                            if($check >= '8' ){
                                echo"<td><a href=# class='btn btn-danger' style='font-weight:unset'>เลยกำหนดส่ง</a></td>";
                            }else{
								echo"<td><a href=# class='btn btn-success' style='font-weight:unset'>ปกติ</a></td>";
                            }
							
							
                            
                            
                            echo"<td><a href=process/default-book2.php?id=$row[0] class='btn btn-danger' style='font-weight:unset'>คืน</a></td>";
                            echo'</tr>';
						
					}
						echo'</tbody>';
						echo'</table>';
						echo '</div>';
						

                        
                       
                        

                    ?>

                   
                            
                        

               

                   

               
                    
                    
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->

		<?php
			include_once("component/footer.php");

		?>
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
    <!-- end page container -->
   



      
          





    

        




    <?php
        include_once("component/jslink.php");
    ?>   
</body>
</html>
                <?php }?>