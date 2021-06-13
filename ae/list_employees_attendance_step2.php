<?php
include_once('security_check_ae.php');
include_once('../database.php');
$ad_id=$_COOKIE['nregs_id'];
$em_id=$_GET['em_id'];
$pw_id=$_GET['pw_id'];

$query1="SELECT work.wk_id,wa_id,`pw_number`,`pw_name`, `ad_firstname`,`ad_lastname`,`wk_type`,
`wk_address`, `wk_startdate`,
 `wk_finishdate`, `wk_status`, `wk_memberapplydate`, `wk_contract`, 
 `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`, `wk_panchayathdate`,
 `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`,
 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` FROM `work`
  inner join panchayath_ward on panchayath_ward.pw_id=work.pw_id 
  inner join area_development_society on area_development_society.ad_id=work.ad_id
  inner join work_employee_allotment on work_employee_allotment.wk_id=work.wk_id 
	and work_employee_allotment.em_id=$em_id";
$data1=DataBase::SelectData($query1);

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once('admin_title.php'); ?>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php
    $currentmenu="wards-employees";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					
					<div class="card">
							<div class="card-header">
								<strong class="card-title">Alloted Works of Selected Employee</strong>
								<a href="list_employees_applications.php?pw_id=<?php echo $pw_id; ?>" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;Back</a>
							
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Work Type</th>
										<th>Address</th>
										<th>Start Date</th>
										<th>Finish Date</th>
										<th class="text-right">Total Attendnace</th>
										<th class="text-right">PerHead Wages</th>
										<th class="text-right">Total Wages</th>
										
									  </tr>
									</thead>
									<tbody>
										<?php
										$totaldays=0;
										$totalwage=0;
										while($row1=mysqli_fetch_array($data1)){
										$query1="select count(*) as totalworkdays from  work_attendance where  wa_id=".$row1['wa_id'];
										$data3=DataBase::SelectData($query1);
										$totalattendnace=mysqli_fetch_array($data3);
										$totaldays+=$totalattendnace['totalworkdays'];
										$totalwage+=$totalattendnace['totalworkdays']*$row1['wk_perheadwages'];
										?>
										<tr>
											<td><?php echo $row1['wk_type']?></td>
											<td><?php echo $row1['wk_address']?></td>
											<td><?php echo $row1['wk_startdate']?></td>
											<td><?php echo $row1['wk_finishdate']?></td>
											<td class="text-right"><b><?php echo $totalattendnace['totalworkdays']?></b></td>
											<td class="text-right"><b><?php echo $row1['wk_perheadwages']?>/-</b></td>
											<td class="text-right"><b><?php echo $totalattendnace['totalworkdays']*$row1['wk_perheadwages']?>/-</b></td>
											
										</tr>
										<?php
										}
										if(mysqli_num_rows($data1)>0){
										?>
										<tr>
											<td class="text-right bg-primary"></td>
											<td class="text-white bg-primary text-white"><b>Total</b></td>
											<td class="text-right bg-primary"></td>
											<td class="text-right bg-primary"></td>
											<td class="text-right bg-primary text-white"><b><?php echo $totaldays; ?></b></td>
											<td class="text-right  bg-primary"><b></b></td>
											<td class="text-right  bg-primary text-white"><b><?php echo $totalwage; ?>/-</b></td>
											
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
