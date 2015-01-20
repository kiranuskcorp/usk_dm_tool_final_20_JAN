<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);

$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php?content=37");
}

if ( !empty($_POST)) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$alternatephone = $_POST['alternatephone'];
	$clientid = $_POST['clientid'];
	$skypeid = $_POST['skypeid'];
	$timezone = $_POST['timezone'];
	$batchid = $_POST['batchid'];
	//$createdDate = $_POST['createdDate'];
	//$updatedDate = $_POST['updatedDate'];
	$description = $_POST['description'];
	$phone = $_POST['phone'];
	$technologyid = $_POST['technologyid'];


	// validate input
	$valid = true;
	if (empty($name)) {
		$valid = false;
	}
	if (empty($email)) {
		$valid = false;
	}
	if (empty($alternatephone)) {
		$valid = false;
	}
	if (empty($clientid)) {
		$valid = false;
	}
	if (empty($skypeid)) {
		$valid = false;
	}
	if (empty($timezone)) {
		$valid = false;
	}
	if (empty($batchid)) {
		$valid = false;
	}

	if (empty($phone)) {
		$valid = false;
	}
	if (empty($technologyid)) {
		$valid = false;
	}

	// update data
	if ($valid) {
		$sql = "traineeUpdate";
		$sqlValues = array($name,$email,$clientid,$skypeid,$timezone,$batchid,$description,$phone);
		GlobalCrud::update($sql,$sqlValuesForUpdate);

		header("Location:../?content=37");
	}
}

else {
	$sql = "traineeSelectById";
	$sqlValues = array($id);
	$data = GlobalCrud::selectById($sql,$sqlValues);
	$name = $data['name'];
	$email = $data['email'];
	$alternatephone = $data['alternate_phone'];
	$clientid = $data['client_id'];
	$skypeid = $data['skype_id'];
	$timezone = $data['timezone'];
	$batchid = $data['batch_id'];
	//$createdDate = $data['created_date'];
	//$updatedDate = $data['updated_date'];
	$description = $data['description'];
	$phone = $data['phone'];
	$technologyid = $data['technology_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a trainee</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="./trainee/update.php?id=<?php echo $id?>" method="post">
					   <div class="control-group ">
					    <label class="control-label">Name</label>
					    <div class="controls">
					    <?php echo !empty($name)?$name:'';?>
					      	
					    </div>
					  </div>
					  
					   
					   <div class="control-group">
					    <label class="control-label">Email</label>
					    <div class="controls">
					    <?php echo !empty($email)?$email:'';?>
					      	
					    </div>
					  </div>
					  
					   <div class="control-group ">
					    <label class="control-label">Alternate Phone</label>
					    <div class="controls">
					    <?php echo !empty($alternatephone)?$alternatephone:'';?>
					      	
					    </div>
					  </div>
					   
					    <div class="control-group ">
					    <label class="control-label">Client</label>
					    <div class="controls">
					    <?php echo !empty($clientid)?$clientid:'';?>
					      	
					    </div>
					  </div>
					  
					  
					   <div class="control-group ">
					    <label class="control-label">Skype</label>
					    <div class="controls">
					    <?php echo !empty($skypeid)?$skypeid:'';?>
					      	
					    </div>
					  </div>
					  
					   <div class="control-group ">
					    <label class="control-label">Timezone</label>
					    <div class="controls">
					    <?php echo !empty($timezone)?$timezone:'';?>
					      	
					    </div>
					  </div>
					  
					   <div class="control-group ">
					    <label class="control-label">Batch</label>
					    <div class="controls">
					    <?php echo !empty($batchid)?$batchid:'';?>
					      	
					    </div>
					  </div>
					  
					  
					<!-- <div class="control-group ">
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createdDate" type="date" placeholder="Created Date" value="<?php echo !empty($createdDate)?$createdDate:'';?>" required>
					      	
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updatedDate" type="date"  placeholder="Updated Date" value="<?php echo !empty($updatedDate)?$updatedDate:'';?>" required>
					      
					    </div>
					  </div> -->

					   <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					    <?php echo !empty($description)?$description:'';?>
					      	
					    </div>
					  </div>
					  
					  
					   <div class="control-group ">
					    <label class="control-label">phone</label>
					    <div class="controls">
					    <?php echo !empty($phone)?$phone:'';?>
					      	
					    </div>
					  </div>
					  
					  
					   <div class="control-group ">
					    <label class="control-label">Technology</label>
					    <div class="controls">
					    <?php echo !empty($technologyid)?$technologyid:'';?>
					      	
					    </div>
					  </div>
					  
					 
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>