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
                <h4>ผู้พัฒนาระบบ</h4>
                    <hr>
                    <div class="row">
                        <div class="col-xl-2 col-md-2">
                            <img src="upload/1587234732.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-xl-10 col-md-10">
                            <div class="row">
                                <div class="col-xl-1 col-md-3">
                                    <img src="assets/img/logo.png" class="img-fluid"alt="">
                                </div>
                                <div class="col-xl-11 mt-md-2 mt-xl-4 col-md-9">
                                    <h5 class="text-pink">นายกัมปนาท ชัยมูลฐาน | Mr.Kampanart Chaimooltan</h5>
                                    <h6>Student & Web Developer & Programmer & Network-Data System & Ubuntu Dev Youth Computer Yupparaj Wittayalai School</h6>
                                </div>
                            </div>
                           
                            
                            <hr>
                            <p><b>โปรเจคคอร์ไอออน ยุวคอมพิวเตอร์ กลุ่มงานคอมพิวเตอร์</b> โรงเรียนยุพราชวิทยาลัย จังหวัดเชียงใหม่<br></p>
                           
                         
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