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
        $sql = "SELECT * FROM book WHERE b_id = '$b_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    }

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
					<h4 class="panel-title">รายละเอียดนักเรียนที่ยืมหนังสือ</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                    <h4>รายละเอียดนักเรียนที่ยืมหนังสือ</h4>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2">
                            <?php
                                $sqlch = "SELECT * FROM student WHERE s_id = '$row[s_id]'";
                                $query = mysqli_query($conn,$sqlch);
                              
                                $fetch = mysqli_fetch_array($query);

                            ?>
                            <img src="upload/<?php echo $fetch['s_pic'];?>" class="img-fluid" alt="">
                        </div>
                        <div class="col-xl-10">
                            <h5>ชื่อ : <?php echo $fetch['s_fname']; echo $fetch['s_name']; echo '&nbsp;' ;echo $fetch['s_lname']; ?></h5>
                            <h5>เลขประจำตัวนักเรียน : <?php echo $fetch['s_sid']; ?></h5>
                            
                            <hr>
                            <h5>ชื่อหนังสือที่ยืม : <b class="font-weight:unset"><?php echo $row['b_name']; ?></b></h5>
                            <h5>กำหนดส่งคืน : <b class="font-weight:unset"><?php echo $row['b_date']; ?></b></h5>
                           
                           
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