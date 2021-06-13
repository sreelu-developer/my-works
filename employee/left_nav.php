<aside id="left-panel" class="left-panel" style="width:350px;">
	<nav class="navbar navbar-expand-sm navbar-default">
		<div class="navbar-header">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="./">NREGS EMPLOYEE</a>
			<a class="navbar-brand hidden" href="./">NREGS</a>
		</div>
		<div id="main-menu" class="main-menu collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php
				if($currentmenu=="employee-attendance"){
					$menuselect="active";
				}
				else{
					$menuselect="";
				}
				?>
				<li class="<?php echo $menuselect; ?>">
					<a href="list_employees_attendance_step2.php"> <i class="menu-icon fa fa-sticky-note"></i>Attendance & Wages</a>
				</li>
				<?php
				if($currentmenu=="employee-workdetails"){
					$menuselect="active";
				}
				else{
					$menuselect="";
				}
				?>
				<li class="<?php echo $menuselect; ?>">
					<a href="list_employees_jobs.php"> <i class="menu-icon fa fa-sticky-note"></i>Work Details</a>
				</li>
				<?php
				if($currentmenu=="employee-equipmentinhand"){
					$menuselect="active";
				}
				else{
					$menuselect="";
				}
				?>
				<li class="<?php echo $menuselect; ?>">
					<a href="list_employeestock_register.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipments In Hand</a>
				</li>
				<?php
				if($currentmenu=="employee-equipmentreturned"){
					$menuselect="active";
				}
				else{
					$menuselect="";
				}
				?>
				<li class="<?php echo $menuselect; ?>">
					<a href="list_employeestock_registe_returned.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipments Returned</a>
				</li>
				<li >
					<a href="../logout_process.php"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
</aside>