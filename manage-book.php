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
					<h4 class="panel-title">ระบบบริหารจัดการห้องสมุด</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
				<a href="add-book.php" class="btn btn-pink" style="font-weight:unset">เพิ่มหนังสือ</a>
				<a href="result-book.php" class="btn btn-indigo" style="font-weight:unset">รายงานการยืมหนังสือ</a>

				<hr>
				<?php
						if(isset($_GET['status'])){
							$status = $_GET['status'];
							if($status == '1'){
					?>
					<div class="alert alert-green text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; เพิ่มหนังสือแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
					<?php }else if($status == '2'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามารถเพิ่มหนังสือได้ !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
				
				
					<?php }else if($status == '3'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่พบไอดีหนังสือ !</b>
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
                    $sql = "SELECT * FROM book ORDER BY b_id ASC";
					$result = mysqli_query($conn,$sql);
					$num = mysqli_num_rows($result);
                        $sqlch2  ="SELECT * FROM book WHERE s_id > 0";
                        $result2 = mysqli_query($conn,$sqlch2);
						$check = mysqli_num_rows($result2);
						$all = $num-$check;
						echo '<p style="font-size:15px">' .'หนังสือทั้งหมด จำนวน '.$num. ' เล่ม '. '</p>';
						echo '<p style="font-size:15px">' .'หนังสือที่ถูกยืมไป จำนวน '.$check. ' เล่ม '. '</p>';
						echo '<p style="font-size:15px">' .'คงเหลือ จำนวน '.$all. ' เล่ม '. '</p>';
						echo '<br>';
					echo '<div class="table-responsive">';
							echo'<table class="table table-striped m-b-0 text-center s9" id="data-table-default">';
							echo'<thead>';
							echo'<tr class="fw-700">';
							echo'<th width="400px">รูปภาพ</th>';
                            echo'<th width="400px">ชื่อหนังสือ</th>';
							echo'<th width="400px">ผู้แต่ง</th>';
							
							echo'<th width="200px">สถานะ</th>';
							echo'<th width="200px">รายละเอียด</th>';
							echo'<th width="200px" >แก้ไข</th>';
							echo'<th width="200px">ลบ</th>';
							echo'</tr>';
							echo'</thead>';
							echo'<tbody>';
                    while($row = mysqli_fetch_array($result)){
                        
						echo'<tr>';
							echo"<td><img src=upload/book/$row[b_pic] class='img-fluid' width='40%'></td>";
                            echo'<td>' .$row['b_name'].'</td>';
							echo'<td>' .$row['b_write']. '</td>';
							
							if($row['s_id'] > 0){
								echo"<td><a href=# class='btn btn-danger bg-red-darker text-white' style='font-weight:unset'><i class='fas fa-times'></i>&nbsp;ยืมแล้ว</a></td>";
							}else{
								echo"<td><a href=# class='btn btn-success bg-green-darker text-white' style='font-weight:unset'><i class='fas fa-check'></i>&nbsp;ยืมได้</a></td>";
							}
                            
                            echo"<td><a href=detail-book2.php?id=$row[0] class='btn btn-yellow' style='font-weight:unset'>รายละเอียด</a></td>";
                            echo"<td><a href=edit-book.php?id=$row[0] class='btn btn-orange' style='font-weight:unset'>แก้ไข</a></td>";
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