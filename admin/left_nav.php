<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">NREGS Admin</a>
                <a class="navbar-brand hidden" href="./">NREGS</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    if($currentmenu=="wards"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_wards.php"> <i class="menu-icon fa fa-map-marker"></i>Wards</a>
                    </li>
					<?php
                    if($currentmenu=="equipments"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_equipments.php"> <i class="menu-icon fa fa-wrench"></i>Equipments</a>
                    </li>
					<?php
                    if($currentmenu=="ae"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_assistant_engineer.php"> <i class="menu-icon fa fa-user-circle"></i>Assi. Engineer</a>
                    </li>
					<?php
                    if($currentmenu=="ps"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_panchayath_secretary.php"> <i class="menu-icon fa fa-user-circle"></i>Panchayath Secretary</a>
                    </li>
					<?php
                    if($currentmenu=="ward members"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_wardmembers.php"> <i class="menu-icon fa fa-user-circle"></i>Ward Members</a>
                    </li>
					 
					
					
					 <li >
                        <a href="../logout_process.php"> <i class="menu-icon fa fa-user-circle"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>