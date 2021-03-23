<?php
    session_start();
    include("connect/connect.php");
	if(!$_SESSION['u_id']){
		header('Location:index.php?status=2');
	}else{

?>
<?php
    if(isset($_GET['id'])){
        $b_id = $_GET['id'];
        $sql2 = "SELECT * FROM book WHERE b_id = '$b_id'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php
    include_once("component/header.php");
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
			<h1 class="page-header s12">ระบบลงทะเบียนกิจกรรมพัฒนาผู้เรียน<small>&nbsp;โรงเรียนยุพราชวิทยาลัย</small></h1>
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
	
					<div class="row">
						<div class="col-xl-2">
							<img src="upload/book/<?php echo $row2['b_pic'];  ?>" class="img-fluid" alt="">
						</div>
						<div class="col-xl-10">
							<h4>ชื่อหนังสือ : <?php echo $row2['b_name'];  ?></h4>
							<h4>ผู้แต่ง : <?php echo $row2['b_write'];  ?></h4>
							<hr>
							<p><?php echo $row2['b_detail'];  ?></p>
						</div>
					</div>
                    
					

                    

                    
                   

                   
                            
                        

               

                   

               
                    
                    
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