<!-- begin #header -->
<div id="header" class="header navbar-inverse s1">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="manage-library.php" class="navbar-brand"> <b>Admin Library</b>Yupparaj<small>&nbsp;2563</small></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				
				
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if($_SESSION['u_pic'] == ''){?>
						<div class="image image-icon bg-black text-grey-darker">
							<i class="fa fa-user"></i>
						</div>
						<?php }else{ ?>
						<div class="image image-icon bg-black text-grey-darker" style="justify-content: unset;">
							<img src="upload/<?php echo $_SESSION['u_pic'];?>" class="img-fluid text-center"  alt="" srcset="">
						</div>
						<?php }?>
						<span class="d-none d-md-inline"></span> <?php echo $_SESSION['u_fname']; echo $_SESSION['u_name']; echo '&nbsp;'; echo $_SESSION['u_lname']; ?><b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						
						<a href="process/logout.php" class="dropdown-item">ออกจากระบบ</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->