<?php 
	
	 $path = $_SERVER['DOCUMENT_ROOT'];
   	 $path .= "/layout/connection/GlobalCrud.php";
   	 include_once($path);
   	 $constants = explode ( ',', GlobalCrud::getConstants ( "roleConstants" ) );
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php?content=13");
	}
	
	if ( !empty($_POST)) {

		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		//$basesalary = $_POST['basesalary'];
		//$createdDate = $_POST['createdDate'];
		$updatedDate = date("Y/m/d");
		$description = $_POST['description'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$valid = false;
		}
		if (empty($phone)) {
			$valid = false;
		}
		
		if (empty($email)) {
			$valid = false;
		}
		
		
		// update data
		if ($valid) {
			$sql = "employeeUpdate";
			$sqlValuesForUpdate = array($name,$phone,$email,$role,$basesalary,$updatedDate,$description,$id);
			GlobalCrud::update($sql,$sqlValuesForUpdate);

			header("Location:../?content=13");
		}
		} 

		else {
				$sql = "employeeSelectById";
				$sqlValues = array($id);
				$data = GlobalCrud::selectById($sql,$sqlValues);
				$name = $data['name'];
				$phone = $data['phone'];
				$email = $data['email'];
				$role = $data['role'];
				$basesalary = $data['base_salary'];
				//$createdDate = $data['created_date'];
		        $updatedDate = $data['updated_date'];
		        $description = $data['description'];
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
		    			<h3>Update a Employee</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="./employee/update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group ">
					  <div class="form-group required">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="name" value="<?php echo !empty($name)?$name:'';?>" required>
					      	</div>
					    </div>
					  </div>
					  
					   <div class="control-group ">
					   <div class="form-group required">
					    <label class="control-label">Phone</label>
					    <div class="controls">
					      	<input name="phone" type="tel"  placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>" required>
					      	</div>
					    </div>
					  </div>
					  
					  
					   <div class="control-group ">
					   <div class="form-group required">
					    <label class="control-label">Email</label>
					    <div class="controls">
					      	<input name="email" type="email"  placeholder="email" value="<?php echo !empty($email)?$email:'';?>" required>
					      	</div>
					    </div>
					  </div>
					   <!-- <div class="control-group">
					    <label class="control-label">Role</label>
					    <div class="controls">
					      	<input name="role" type="text"  placeholder="role" value="<?php echo !empty($role)?$role:'';?>" required>
					      	
					    </div>
					  </div>-->
					  
					  <div class="control-group">
					<label class="control-label">Role</label>
					<div class="controls">
						<select name="role" type="text">
							<option value="0">Select</option>
                          <?php foreach ($constants as $constant): ?>
						<option <?php if($constant == $role) {  ?>
								selected="selected" value="<?=$constant?>"> <?php
							}
							else {
								?> value="<?=$constant?>" > <?php
							}
							echo $constant;
							?>
 							</option>
							
						<?php endforeach ?>
						</select>
					</div>
				</div>
					  
					  <!-- <div class="control-group ">
					    <label class="control-label">Base Salary</label>
					    <div class="controls">
					      	<input name="basesalary" type="text"  placeholder="base salary" value="<?php echo !empty($basesalary)?$basesalary:'';?>" >
					      	
					    </div>
					  </div> -->
					   
					
					   <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      	<textarea name="description" type="text"  placeholder="description" >
					      	 <?php echo !empty($description)?$description:'';?>
					      	</textarea>
					    </div>
					  </div>
					  
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>