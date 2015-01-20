<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$traineeData = GlobalCrud::getData('traineeSelect');
$employeeData = GlobalCrud::getData('employeeSelect');
$clientData = GlobalCrud::getData('clientSelect');
$timeConstants = explode(',', GlobalCrud::getConstants("timeConstants"));
$interviewconstants = explode(',', GlobalCrud::getConstants("interviewconstants"));

if ( !empty($_POST)) {

	// keep track post values

	//traineeid assistedby clientid interviewer time status date  description

	$traineeid = $_POST['traineeid'];
	$assistedby = $_POST['assistedby'];
	$clientid=$_POST['clientid'];
	$interviewer=$_POST['interviewer'];
	$time=$_POST['time'];
	$status=$_POST['status'];
	$createdDate = date("Y/m/d");
	$description = $_POST['description'];
	$date=$_POST['date'];

	// validate input
	$valid = true;
	if (empty($traineeid)) {
		$valid = false;
	}
	if (empty($assistedby)) {
		$valid = false;
	}
	if (empty($clientid)) {
		$valid = false;
	}
	if (empty($date)) {
		$valid = false;
	}


	// insert data
	if ($valid) {
		$sql = "interviewInsert";
		$sqlValues = array($traineeid,$assistedby,$clientid,$interviewer,$time,$status,$createdDate,$description,$date);
		GlobalCrud::setData($sql,$sqlValues);
		header("Location:../?content=22");
	}
	else{

		header("Location:../?content=23");
	}

}

/*if ( !empty($_GET)) {
 echo "<script type='text/javascript'>alert('get');</script>";
}*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Interview</h3>
			</div>

			<form class="form-horizontal" action="./interview/create.php"
				method="post">


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Trainee Name</label>
						<div class="controls">
							<select name="traineeid" type="text" required>
								<option value="0">Select</option>
								<?php foreach ($traineeData as $row): ?>
								<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>
							</select>
						</div>
					</div>
				</div>

				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Assisted By</label>
					<div class="controls">
						<select name="assistedby" type="text">
							<option value="0">Select</option>
							<?php foreach ($employeeData as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
					</div>
				</div>


				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Client Name</label>
					<div class="controls">
						<select name="clientid" type="text">
							<option value="0">Select</option>
							<?php foreach ($clientData as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select>
						</div>
					</div>
				</div>



				<div class="control-group ">
					<label class="control-label">End Client</label>
					<div class="controls">
						<input name="interviewer" type="text" placeholder="end client"
							value="<?php echo !empty($interviewer)?$interviewer:'';?>"
							>

					</div>
				</div>





				<div class="control-group">
					<label class="control-label">Time</label>
					<div class="controls">
						<select name="time" type="time">
							<option value="0">Select</option>
							<?php foreach ($timeConstants as $timeConstant): ?>
							<option value="<?=$timeConstant?>">
								<?php echo $timeConstant;?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
				</div>


				<div class="control-group ">
					<label class="control-label">Status</label>
					<div class="controls">
						<select name="status" type="text">
							<option value="">Select</option>
							<?php foreach ($interviewconstants as $interviewconstant): ?>
							<option value="<?=$interviewconstant?>">
								<?php echo $interviewconstant;?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Interview Date</label>
						<div class="controls">
							<input name="date" type="date" placeholder="date"
								value="<?php echo !empty($date)?$date:'';?>" required>
						</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description"
							value="<?php echo !empty($description)?$description:'';?>">
					      	</textarea>
					</div>
				</div>



				<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>
