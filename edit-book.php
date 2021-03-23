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
					<h4 class="panel-title">ระบบแก้ไขหนังสือ</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
                    <h3>ระบบแก้ไขหนังสือ</h3>
                    <hr>

                <form action="process/edit-bookact.php" method="post" enctype="multipart/form-data">
						
                    <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">ไอดีหนังสือ</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="ชื่อหนังสือ" name="b_id" id="b_id" value="<?php echo $row['b_id'] ?>" readonly>
								
								</div>
                        </div>

                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">ชื่อหนังสือ</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="ชื่อหนังสือ" name="b_name" id="b_name" value="<?php echo $row['b_name'] ?>">
								
								</div>
                        </div>
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">ผู้แต่ง</label>
								<div class="col-md-10">
									<input type="text" class="form-control m-b-5" placeholder="ผู้แต่ง" name="b_write" id="b_write" value="<?php echo $row['b_write'] ?>">
									
								</div>
                        </div>
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">รายละเอียด</label>
								<div class="col-md-10">
                                    <textarea name="b_detail" id="b_detail"  class="form-control m-b-5"><?php echo $row['b_detail'] ?></textarea>
									
						
								</div>
                        </div>
                        
                      
                        
                        <div class="form-group row m-b-15">
							<label class="col-form-label col-md-2">รูปภาพ</label>
								<div class="col-md-10">
									<input type="file" class="form-control m-b-5" placeholder="รูปภาพ" name="b_pic" id="b_pic" value="<?php echo $row['b_pic'] ?>" onchange="readURL(this)">
								</div>
                        </div>
                        
                        <input type="submit" class="btn btn-green" style="color: white;font-weight:unset" name="submit" value="แก้ไขหนังสือ">

				
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