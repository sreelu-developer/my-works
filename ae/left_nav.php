<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">NREGS A.E</a>
                <a class="navbar-brand hidden" href="./">NREGS</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    if($currentmenu=="wards-employees"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_wards_employees.php"> <i class="menu-icon fa fa-users"></i>Ward Employees</a>
                    </li>
					<?php
                    if($currentmenu=="ADS"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_ads.php"> <i class="menu-icon fa fa-podcast"></i>ADS</a>
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
					<?php
                    if($currentmenu=="equipment stock"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
					<li class="<?php echo $menuselect; ?>">
                        <a href="list_equipmentstock.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipment Inward Stock</a>
                    </li>
                    <?php
                    if($currentmenu=="equipment outward"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
					<li class="<?php echo $menuselect; ?>">
                        <a href="list_equipmentoutward.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipment Outward ADS</a>
                    </li>
					<?php
                    if($currentmenu=="equipment inwardads"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
					<li class="<?php echo $menuselect; ?>">
                        <a href="list_equipmentinward_ads.php"> <i class="menu-icon fa fa-cart-arrow-down"></i>Equipment Inward ADS</a>
                    </li>
					 <li >
                        <a href="../logout_process.php"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>