<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">NREGS MEMBER</a>
                <a class="navbar-brand hidden" href="./">NREGS</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    if($currentmenu=="Apply-New-Work"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="manage_works.php"> <i class="menu-icon fa fa-plus"></i>Apply for New Work</a>
                    </li>
					<?php
                    if($currentmenu=="New-Applied-Works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_newapplied_works.php"> <i class="menu-icon fa fa-map-marker"></i>New Applied Works</a>
                    </li>
					<?php
                    if($currentmenu=="New-Approved-Works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_waitingtostart_works.php"> <i class="menu-icon fa fa-map-marker"></i>Works Waiting to Start</a>
                    </li>
					<?php
                    if($currentmenu=="Progressing-Works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_progressing_works.php"> <i class="menu-icon fa fa-map-marker"></i>Works on Progress</a>
                    </li>
					<?php
                    if($currentmenu=="Finished-Works"){
                        $menuselect="active";
                    }
                    else{
                        $menuselect="";
                    }
                    ?>
                    <li class="<?php echo $menuselect; ?>">
                        <a href="list_finished_works.php"> <i class="menu-icon fa fa-map-marker"></i>Finished Works</a>
                    </li>
					
					 <li >
                        <a href="../logout_process.php"> <i class="menu-icon fa fa-user-circle"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>