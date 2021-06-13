<aside id="left-panel" class="left-panel" style="min-width:350px;">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">NREGS ADS</a>
                <a class="navbar-brand hidden" href="./">NREGS</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    if($currentmenu=="employees"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_employees.php"> <i class="menu-icon fa fa-users"></i>Employees</a>
                    </li>
					<?php
                    if($currentmenu=="employee-attendance"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_employees_attendance.php"> <i class="menu-icon fa fa-sticky-note"></i>Employee Attendance Report</a>
                    </li>
					<li style="border-top:1px solid #fff;" >
					</li>
					<?php
                    if($currentmenu=="waiting-approval"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_waitingapproval_works.php"> <i class="menu-icon fa fa-pause"></i>Works Waiting-Approval</a>
                    </li>
					<?php
                    if($currentmenu=="approved-works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_approved_works.php"> <i class="menu-icon fa fa-play"></i>Works Approved</a>
                    </li>
					
					<?php
                    if($currentmenu=="rejected-works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_rejected_works.php"> <i class="menu-icon fa fa-stop"></i>Works Rejected</a>
                    </li>
					<li style="border-top:1px solid #fff;" >
					</li>
					<?php
                    if($currentmenu=="employee-allotment"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_employee_allotment.php"> <i class="menu-icon fa fa-compress"></i>Work-Employee Allotment</a>
                    </li>
					<?php
                    if($currentmenu=="start-work"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_start_work.php"> <i class="menu-icon fa fa-forward"></i>Start Work</a>
                    </li>
					<?php
                    if($currentmenu=="work-attendance"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_attendance_step1.php"> <i class="menu-icon fa fa-forward"></i>Work Attendance</a>
                    </li>
					<?php
                    if($currentmenu=="work-finished"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_finished_work_step1.php"> <i class="menu-icon fa fa-eject"></i>Finished Work</a>
                    </li>
					<li style="border-top:1px solid #fff;" >
					</li>
					<?php
                    if($currentmenu=="recived-equipment-from-ae"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_equipmentstock.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipment Stock Info</a>
                    </li>
					<?php
                    if($currentmenu=="equipment-distribution-to-employee"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_equipmentstock_distribution.php"> <i class="menu-icon fa fa-sitemap"></i>Equipment Distribution</a>
                    </li>
					<?php
                    if($currentmenu=="employee-stock-info"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_employeestock.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Employee Stock Info</a>
                    </li>
					<li style="border-top:1px solid #fff;" >
					</li>
					 <li >
                        <a href="../logout_process.php"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>