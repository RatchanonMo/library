<!DOCTYPE html>
<html lang="en">
    <?php
        include_once('component/header.php');
    ?>
<body class="pace-top" style="background-color:#ffe6f9">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin login -->
		<div class="login login-with-news-feed">
			<!-- begin news-feed -->
            <div class="container">
				<div class="row">
					<div class="col-xl-4"></div>

					<div class="col-xl-4 text-center mt-xl-5 mt-5" align="center">
						<h3 style="color:#e91e63;font-weight:700;font-size:30px">Library YRC</h3>
						<p style="margin-top: -10px">ระบบบริหารจัดการ-ยืมคืนหนังสือห้องสมุด</p>
						<br>
						<div class="col-xl-12 bg-white" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);padding:10px">
							<p class="mt-3 s1 fw-500">เข้าสู่ระบบ | Login</p>
							<hr>

							<?php
								if(isset($_GET['status'])){
									$status = $_GET['status'];
									if($status == '1'){
							?>
							<div class="alert alert-danger text-left ">
								<div class="alert-icon">
									<i class="fas fa-newspaper"></i>
									<b class="" style="font-size: 15px">&nbsp; Username หรือ Password ไม่ถูกต้อง !</b>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fas fa-times"></i></span>
									</button>
								</div> 
							</div>
							<?php }else if($status == '2'){?>
							<div class="alert alert-danger text-left">
								<div class="alert-icon">
									<i class="fas fa-newspaper"></i>
									<b class="" style="font-size: 15px">&nbsp; กรุณาลงชื่อเข้าใช้สู่ระบบ !</b>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><i class="fas fa-times"></i></span>
									</button>
								</div> 
							</div>
							<?php }?>
							<?php }?>
					
								<form action="process/loginact.php" method="post" >
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text" style="border: none;background-color: transparent;padding-left: 0;font-weight: bold;">
										<i class="fas fa-user-lock"></i>
										</span>
										</div>
										<input type="text" class="form-control" placeholder="เลขประจำตัวนักเรียน" name="s_sid" id="s_sid" required>
									</div>
									<br>
									<input type="submit" name="submit" class="btn btn-pink bg-pink btn-sm" style="width:100%;background-color:#e91e63;font-size:12px;font-weight:unset" value="เข้าสู่ระบบ">
								</form>
						</div>

					</div>
					<div class="col-xl-4"></div>

				</div>

				</div>
				<?php
					include_once('component/footerlog.php');
				?>
				</div>
				<!-- end login-content -->
			</div>
			<!-- end right-container -->
		</div>
		<!-- end login -->

	</div>
	<!-- end page container -->
	
    <?php
        include_once('component/jslink.php');
    ?>
</body>
</html>
