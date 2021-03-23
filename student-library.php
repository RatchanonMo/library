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
							<b class="" style="font-size: 15px">&nbsp; ยืมหยังสือแล้ว !</b>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fas fa-times"></i></span>
							</button>
						</div> 
					</div>
					<?php }else if($status == '2'){?>
					<div class="alert alert-danger text-left">
						<div class="alert-icon">
						<i class="fas fa-book"></i>
							<b class="" style="font-size: 15px">&nbsp; ไม่สามรถยืมหนังสือได้ !</b>
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
                        $sql2 = "SELECT * FROM book WHERE s_id = '$_SESSION[s_id]'";
                        $query = mysqli_query($conn,$sql2);
                        $book  = mysqli_num_rows($query);
                        if($book >5){
                            
                        }else{
                            
                        }
                       
                        
                        
                        while($row = mysqli_fetch_array($result)){
							
							echo ' <div class="col-xl-2 col-md-4 pb-3" style="float:left;">';
							echo ' <div class="card">';
							echo "<img src=upload/book/$row[b_pic]  class='card-img-top pt-3' width='40%'>";
							echo ' <div class="card-body text-center">';
                            echo '<h5>' .$row['b_name']. '</h5>';

                            if($book >= 5){
                                echo '<a href="#" class="btn btn-danger">เกินโค้วต้า</a>';
                            }else{
                                if($row['s_id'] > 0){
                                    echo '<a href="#" class="btn btn-danger">มีคนยืมแล้ว</a>';
                                }else{
                                    echo "<a href=detail-book.php?id=$row[0] class='btn btn-success' style='font-weight:unset'>ยืมหนังสือ</a>";
                                }
							}                               
							echo '</div>';
							echo '</div>';
							echo '</div>';
							
						}
						

                        
                       
                        

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