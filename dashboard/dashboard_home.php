<?php
error_reporting ( 0 );
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";

include_once ($path);
date_default_timezone_set ( "Asia/Kolkata" );
$dropdown = '';
$dataPayment = GlobalCrud::getData ( 'paymentPendingSelect' );

$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboard', array (
		'0',
		'0' 
) );
$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboard', array (
		'0',
		'0' 
) );
$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboard', array (
		'0',
		'0' 
) );

$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupport', array (
		'0',
		'0' 
) );
$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClient', array (
		'0',
		'0' 
) );
$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterview', array (
		'0',
		'0' 
) );

if (! empty ( $_POST )) {
	
	// keep track post values
	$id = $_POST ['id'];
	
	if ($id == 1) {
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboard', array (
				$id,
				$id 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboard', array (
				$id,
				$id 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboard', array (
				$id,
				$id 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupport', array (
				$id,
				$id 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClient', array (
				$id,
				$id 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterview', array (
				$id,
				$id 
		) );
		$dateValue1 = date ( 'Y-M-d' );
		$dateT1 = date_create ( $dateValue1 );
		$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 month' ) );
		$date1 = date_format ( $temDate1, 'Y-m' );
		$dropdown = 'Last Month Details   : ' . $date1;
	}
	
	if ($id == 2) {
		// current finacial year 2014-04-01 to 2015-03-31
		$dateValue1 = date ( 'Y' ) . '-04-01'; // 2015-04-01
		$dateValue2 = date ( 'Y' ) . '-03-31'; // 2015-03-31
		$dateT1 = date_create ( $dateValue1 );
		$dateT2 = date_create ( $dateValue2 ); //
		if (date ( 'm' ) < 4) {
			// 2014-04-01 to 2015-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '0 year' ) );
		} elseif (date ( 'm' ) >= 4) {
			// 2015-04-01 to 2016-03-31
			$temDate1 = date_add ( $dateT1, date_interval_create_from_date_string ( '0 year' ) );
			$temDate2 = date_add ( $dateT2, date_interval_create_from_date_string ( '1 year' ) );
		}
		
		$date1 = date_format ( $temDate1, 'Y-m-d' );
		$date2 = date_format ( $temDate2, 'Y-m-d' );
		
		// echo "current year ".$date1 ." to ".$date2;
		
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupportYear', array (
				$date1,
				$date2 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClientYear', array (
				$date1,
				$date2 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterviewYear', array (
				$date1,
				$date2 
		) );
		
		$dropdown = 'Current Year Details From :' . $date1 . " to " . $date2;
	}
	
	if ($id == 3) {
		// last finalical year 2013-04-01 to 2014-03-31
		
		$dateValue1 = date ( 'Y' ) . '-04-01'; // 2015-04-01
		$dateValue2 = date ( 'Y' ) . '-03-31'; // 2015-03-31
		$dateT1 = date_create ( $dateValue1 );
		$dateT2 = date_create ( $dateValue2 ); //
		if (date ( 'm' ) < 4) {
			// 2014-04-01 to 2015-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '2 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '1 year' ) );
		} elseif (date ( 'm' ) >= 4) {
			// 2015-04-01 to 2016-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '0 year' ) );
		}
		
		$date1 = date_format ( $temDate1, 'Y-m-d' );
		$date2 = date_format ( $temDate2, 'Y-m-d' );
		
		// echo "last year ".$date1 ." to ".$date2;
		
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupportYear', array (
				$date1,
				$date2 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClientYear', array (
				$date1,
				$date2 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterviewYear', array (
				$date1,
				$date2 
		) );
		
		$dropdown = 'Last Year Details From :' . $date1 . " to " . $date2;
	}
}
?>

<!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<title>Usk Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.min.css" rel="stylesheet">

<link href=".css/asterisk.css" rel="stylesheet" type="text/css" />
<link href="./css/fa/css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable-0.1.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable.sortable-0.1.css" rel="stylesheet"
	type="text/css" />

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>
<script src="./js/foot/footable-0.1.js" type="text/javascript"></script>
<script src="./js/foot/footable.sortable.js" type="text/javascript"></script>
<script src="./js/foot/footable.filter.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
      $('table').footable(



    	      );
    });

   
    
  </script>
<style type="text/css">
.labelData {
	font-size: 25px;
	color: #45aed0;
}

#dashboard {
	width: 48%;
	height: auto;
	top: 30px;
	left: -15px;
	padding: 10px;
	float: left;
}

#dashboard .A {
	width: 100%;
	height: 210px;
	overflow: auto;
	float: left;
}

#dashboardr .B {
	width: 100%;
	height: 210px;
	overflow: auto;
	float: right;
}

#dashboard .C {
	width: 100%;
	height: 210px;
	overflow: auto;
	float: left;
}

#dashboard .E {
	width: 100%;
	height: 210px;
	overflow: auto;
	float: left;
}

#dashboard, #dashboard>div {
	-webkit-box-sixing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.title {
	text-align: right;
	padding-right: 20px;
}

#label {
	text-align: center;
	padding-right: 10px;
}

.a {
	height: 250px;
	overflow: auto;
}

#dashboardr {
	width: 48%;
	height: auto;
	top: 30px;
	left: -15px;
	padding: 10px;
	float: right;
}

#dashboardrr .D {
	width: 100%;
	height: 205px;
	overflow: auto;
	float: left;
}

#dashboardrl .D {
	width: 100%;
	height: 205px;
	overflow: auto;
	float: left;
}

#dashboardrl {
	width: 46%;
	height: auto;
	border: 1px;
	left: -15px;
	padding: 5px;
	float: left;
}

#dashboardrr {
	width: 46%;
	height: auto;
	left: -15px;
	padding: 5px;
	float: right;
}

.left1 {
	float: left;
	width: 65%;
	text-align: center
	/* clear: left;
	position: relative;
	bottom: -50px; */
}

.right1 {
	float: right;
	width: 32%;
	color: #45aed0;
	/*clear: right; */
}
</style>

</head>
<body>
	<!-- Begin Wrapper -->
	<div class="container-fluid">
	
	
	<div class="row">
	<div class="left1">
		<p class="labelData">
				<?php echo empty($dropdown)?'Current Month Details  : '.date('M-Y'):$dropdown;?>
			</p>
		</div>
		<div id="dropdown" class="right1">

			<form class="form-horizontal" action="#" method="post">
				<div class="control-group">
					<div class="form-group required">

						<div class="controls">

							Select:<select name="id" id="id">
								<option value="0">Current Month</option>
								<option value="1">Last Month</option>
								<option value="2">Current Year</option>
								<option value="3">Last Year</option>
							</select>
							<button type="submit" class="btn btn-success">GO!</button>
						</div>
					</div>
				</div>
			</form>
	</div>

</div>


		<div id="dashboard">

			<p class="labelData">Payment Pending</p>

			<div class='A' id="none" data-panel_type="none">

				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Candidate Name</th>
							<th>Client Name</th>
							<th>Category</th>
							<th>Assisted By</th>


						</tr>
					</thead>
					<tbody>
						
					<?php
					
					foreach ( $dataPayment as $row ) {
						echo '<tr>';
						echo '<td>' . $row ['name'] . '</td>';
						echo '<td>' . $row ['client'] . '</td>';
						echo '<td>' . $row ['category'] . '</td>';
						echo '<td>' . $row ['assistedBy'] . '</td>';
						echo '</tr>';
					}
					?>
					</tbody>
				</table>
				
				<?php echo empty($dataPayment)?'No Records Found':'';?>
			</div>


			<p class="labelData">Support</p>
			<div class='C' id="none" data-panel_type="none">

				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Supported By</th>
							<th>Supported To</th>
							<th>Start Date</th>
							<th>Technology</th>
						</tr>
					</thead>
					<tbody>
					
						<?php
						
						foreach ( $dataSupport as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['supportedBy'] . '</td>';
							echo '<td>' . $row ['supportedTo'] . '</td>';
							echo '<td>' . $row ['startedDate'] . '</td>';
							echo '<td>' . $row ['technology'] . '</td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
				<?php echo empty($dataSupport)?'No Records Found':'';?>
			</div>


			<p class="labelData">Interview</p>
			<div class='E' id="none" data-panel_type="none">

				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Consultant For</th>
							<th>Supported By</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
							<?php
							
							foreach ( $dataInterview as $row ) {
								echo '<tr>';
								echo '<td>' . $row ['date'] . '</td>';
								echo '<td>' . $row ['trainee'] . '</td>';
								echo '<td>' . $row ['supportedBy'] . '</td>';
								echo '<td>' . $row ['status'] . '</td>';
								echo '</tr>';
								$count ++;
							}
							?>
					</tbody>
				</table>
				<?php echo empty($dataInterview)?'No Records Found':'';?>
			</div>




		</div>



		<div id="dashboardr">

			<p class="labelData">Batch</p>

			<div class='B' id="none" data-panel_type="none">

				<table data-filter="#filter" class="footable">
					<thead>
						<tr>

							<th>Batch Id</th>
							<th>Number Of Students</th>
							<th>Trainer</th>
							<th>Technology</th>
						</tr>

					</thead>
					<tbody>
						<?php
						
						foreach ( $dataBatch as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['batchId'] . '</td>';
							echo '<td>' . $row ['noofStudent'] . '</td>';
							echo '<td>' . $row ['name'] . '</td>';
							echo '<td>' . $row ['technologyName'] . '</td>';
							echo '</tr>';
							$count ++;
						}
						?>
					</tbody>
				</table>
				<?php echo empty($dataBatch)?'No Records Found':'';?>
			</div>

			<div id="dashboardrl">
				<p class="labelData">Support Closed Transactions</p>
				<div class='D' id="none" data-panel_type="none">

					<table data-filter="#filter" class="footable">
						<thead>
							<tr>
								<th>Client Name</th>

								<th>Support Count</th>


							</tr>
						</thead>
						<tbody>
						
						<?php
						
						foreach ( $dataSupportTran as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['client'] . '</td>';
							echo '<td>' . $row ['support'] . '</td>';
							
							echo '</tr>';
						}
						
						?>
					</tbody>
					</table>
					<?php echo empty($dataSupportTran)?'No Records Found':'';?>
				</div>


			</div>



			<div id="dashboardrr">
				<p class="labelData">Interview Closed Transactions</p>
				<div class='D' id="none" data-panel_type="none">

					<table data-filter="#filter" class="footable">
						<thead>
							<tr>
								<th>Client Name</th>


								<th>Interview Count</th>



							</tr>
						</thead>
						<tbody>
						
						<?php
						
						foreach ( $dataInterviewTran as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['client'] . '</td>';
							
							echo '<td>' . $row ['interview'] . '</td>';
							
							echo '</tr>';
							$count ++;
						}
						?>
					</tbody>
					</table>
					
					<?php echo empty($dataInterviewTran)?'No Records Found':'';?>
				</div>


			</div>

			<div id="dashboardrl">
				<p class="labelData">Training Closed Transactions</p>
				<div class='D' id="none" data-panel_type="none">

					<table data-filter="#filter" class="footable">
						<thead>
							<tr>
								<th>Client Name</th>


								<th>Training Count</th>


							</tr>
						</thead>
						<tbody>
						
						<?php
						
						foreach ( $dataClientTran as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['client'] . '</td>';
							echo '<td>' . $row ['training'] . '</td>';
							echo '</tr>';
						}
						?>
					</tbody>
					</table>
					
					<?php echo empty($dataClientTran)?'No Records Found':'';?>
				</div>


			</div>



		</div>
		<!-- 
		
		select cl.name,count(s.id) as 'support', '' as 'interview','' as 'trainee' from client cl, support s ,trainee tra where s.trainee_id = tra.id AND cl.id = tra.client_id GROUP BY cl.name
		select cl.name,'' as 'support', count(i.id) as 'interview','' as 'trainee' from client cl, interview i ,trainee tra where i.trainee_id = tra.id AND cl.id = i.client_id GROUP BY cl.name
		MONTH(CURDATE())
	
-->
	</div>
	<!-- Begin Content -->
</body>
</html>