<?php
    session_start();
    include("connect/connect.php");
    if(!$_SESSION['u_id']){
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
            include_once('component/navbar2.php')
        ?>

        <?php
            include_once('component/slidebar2.php')
        ?>
		

		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header s12">ระบบบริหารจัดการห้องสมุด<small>&nbsp;โรงเรียนยุพราชวิทยาลัย</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading ">
					<h4 class="panel-title">ระบบบริหารจัดการนักเรียน</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                    <a href="add-student.php" class="btn btn-pink" style="font-weight: unset">เพิ่มนักเรียน</a>
					
					<hr>
					<?php
						if(isset($_GET['status'])){
							$status = $_GET['status'];
							if($status == '1'){
					?>
					<div class="alert alert-green text-left">
						<div class="alert-icon">
						<i class="fas fa-user-graduate"></i>
							<b class="" style="font-size: 15px">&nbsp; เพิ่มนักเรียนแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
					<?php }else if($status == '2'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-user-graduate"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามารถเพิ่มนักเรียนได้ !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
				
					<?php }else if($status == '3'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-user-graduate"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่พบไอดีนักเรียน !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>

					<?php }else if($status == '4'){?>
					<div class="alert alert-green text-left">
						<div class="alert-icon">
						<i class="fas fa-user-graduate"></i>
							<b class="" style="font-size: 15px">&nbsp; แก้ไขนักเรียนแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
					<?php }else if($status == '5'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-user-graduate"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามารถแก้ไขนักเรียนได้ !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
					<?php }?>
					<?php }?>
                        

                    <?php
                        $sqlstudent = "SELECT * FROM student ORDER BY s_id ASC";
                        $result = mysqli_query($conn,$sqlstudent);
                        	echo '<div class="table-responsive">';
							echo'<table class="table table-striped m-b-0 text-center s9" id="data-table-default">';
							echo'<thead>';
							echo'<tr class="fw-700">';
							echo'<th width="400px">รูปภาพ</th>';
                            echo'<th width="400px">เลขประจำตัว</th>';
							echo'<th width="400px">ชื่อ-สกุล</th>';
							

							echo'<th width="200px">รายละเอียด</th>';
							echo'<th width="200px" >แก้ไข</th>';
							echo'<th width="200px">ลบ</th>';
							echo'</tr>';
							echo'</thead>';
							echo'<tbody>';
                        while($row = mysqli_fetch_array($result)){
							echo'<tr>';
							echo"<td><img src=upload/$row[s_pic] class='img-fluid' width='40%'></td>";
                            echo'<td>' .$row['s_sid'].'</td>';
                            echo'<td>' .$row['s_fname']. $row['s_name']. '&nbsp;' .$row['s_lname'].  '</td>';
                           
                            echo"<td><a href=detail-student.php?id=$row[0] class='btn btn-green' style='font-weight:unset'>รายละเอียด</a></td>";
                            echo"<td><a href=edit-student.php?id=$row[0] class='btn btn-orange' style='font-weight:unset'>แก้ไข</a></td>";
                            echo"<td><a href=process/delete-student.php?id=$row[0] class='btn btn-danger' style='font-weight:unset'>ลบ</a></td>";
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