		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile" >
						<a href="javascript:;" data-toggle="nav-profile" style="background-color: #e8ebef;">
							<div class="image image-icon bg-success text-grey-darker" style="width: 120px;height:120px;border-radius:120px">
								<img src="upload/<?php echo $_SESSION['s_pic'];?>" class="img-fluid text-center" width="120px" alt="" srcset="">
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?php echo $_SESSION["s_fname"]  ; echo $_SESSION["s_name"]; echo "&nbsp;"  ; echo $_SESSION["s_lname"]  ; ?>
								
								<small>เลขประจำตัว : <?php echo $_SESSION["s_sid"]; ?></small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="dev.php"><i class="fas fa-copyright"></i> ผู้พัฒนา</a></li>
							
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
				
				<li class="nav-header">สถานะการยืม</li>
				<?php
					$sql = "SELECT * FROM book WHERE s_id = '$_SESSION[s_id]' ";
					$result = mysqli_query($conn,$sql);
					$check = mysqli_num_rows($result);
					$row = mysqli_fetch_array($result);

				

					if($check >= '5'){
						
				?>

				<li class="active">
						<a href="#">
						<i class="fas fa-book"></i>
							<span>จำกัดการยืมครั้งละ 5 เล่ม</span>
						</a>
				</li>
				

				<li>
						<a href="result-mybook.php">
						<i class="fas fa-table"></i>
							<span>รายการยืม/คืน หนังสือ</span>
						</a>
				</li>


					<?php } else{ ?>
				<li class="active">
						<a href="#">
						<i class="fas fa-book"></i>
							<span>ขณะนี้ยืมหนังสือ : <?php echo $check; ?>  เล่ม</span>
						</a>
				</li>

				<li>
						<a href="result-mybook.php">
						<i class="fas fa-table"></i>
							<span>รายการยืม/คืน หนังสือ</span>
						</a>
				</li>


					<?php }?>
				
				
			

				
			
				<hr style="margin-bottom: unset">
					<li class="nav-header">เมนูการใช้งาน</li>
					<li class="">
						<a href="student-library.php">
						<i class="fas fa-home"></i>
							<span>หน้าหลัก</span>
						</a>
					</li>
					<li class="">
						<a href="process/logout.php">
						<i class="fas fa-sign-out-alt"></i>
							<span>ออกจากระบบ</span>
						</a>
					</li>
					
					</li>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->