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
					<h4 class="panel-title">ระบบเพิ่มนักเรียน</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                    <h3>ระบบเพิ่มนักเรียน</h3>
                    <hr>

                <form action="process/add-studentact.php" method="post" enctype="multipart/form-data">
						<div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">คำนำหน้าชื่อ</label>
								<div class="col-md-10">
                                        <select class="form-control" name="s_fname" id="s_fname">
                                            <option>เด็กชาย</option>
                                            <option>เด็กหญิง</option>
                                            <option>นาย</option>
                                            <option>นางสาว</option>
										</select>
							
								</div>
                        </div>

                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">ชื่อ</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="ชื่อ" name="s_name" id="s_name">
								
								</div>
                        </div>
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">สกุล</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="สกุล" name="s_lname" id="s_lname">
									
								</div>
                        </div>
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">เลขประจำตัว</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="เลขประจำตัว" name="s_sid" id="s_sid">
						
								</div>
                        </div>
                        
                      
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">รูปภาพ</label>
								<div class="col-md-10">
									<input type="file" class="form-control m-b-5" placeholder="รูปภาพ" name="s_pic" id="s_pic" onchange="readURL(this)">
								</div>
                        </div>
                        
                        <input type="submit" class="btn btn-green" style="color: white;font-weight:unset" name="submit" value="เพิ่มนักเรียน">

				
                    </form>
			
                            
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