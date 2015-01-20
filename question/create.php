<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$endClientData = GlobalCrud::getData('interviewSelect');

if ( !empty($_POST)) {

	// keep track post values

	$interviewid = $_POST['interviewid'];
	$question = $_POST['question'];
	$answers=$_POST['answers'];
	$createdDate = date("Y/m/d");
	//$updated_date = $_POST['updated_date'];
	$description = $_POST['description'];

	// validate input
	$valid = true;
	if (empty($interviewid)) {
		$valid = false;
	}
	
	if (empty($question)) {
		$valid = false;
	}
	

		
	// insert data
	if ($valid) {
		$sql = "questionInsert";
		$sqlValues = array($interviewid,$question,$answers,$createdDate,$description);
		GlobalCrud::setData($sql,$sqlValues);
		header("Location:../?content=34");
	}
	else{

		header("Location:../?content=35");
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
				<h3>Create a Question</h3>
			</div>

			<form class="form-horizontal" action="./question/create.php"
				method="post">

				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">End Cilent</label>
					<div class="controls">
						<select name="interviewid" type="text">
							<option value="0">Select</option>
							<?php foreach ($endClientData as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['interviewer'];?>
								<?php endforeach ?>
							</option>
						</select>
						</div>
					</div>
				</div>



				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Question</label>

						<div class="controls">
							<input name="question" type="text" placeholder="question"
								value="<?php echo !empty($question)?$question:'';?>" required>
						</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Answers</label>
					<div class="controls">
						<textarea name="answers" type="text" placeholder="answers"
							value="<?php echo !empty($answers)?$answers:'';?>" >
					    	</textarea>
					</div>
				</div>

				<!--  <div class="control-group 
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createdDate" type="text"  placeholder="created Date" value="<?php echo !empty($createddate)?$createddate:'';?>" required>
					    
					    </div>
					  </div>
					  
					  <div class="control-group 
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updatedDate" type="text"  placeholder="Updated Date" value="<?php echo !empty($updateddate)?$updateddate:'';?>" required>
					    
					    </div>
					  </div>-->
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
