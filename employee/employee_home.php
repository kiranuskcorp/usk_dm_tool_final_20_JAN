<!DOCTYPE html>
<html lang="en">

<body>
    <div  class="container-fluid">
		<div class="row">
    			<h3>Employee</h3>
    		</div>
			<div class="row">
				<p>
					<a href="?content=14" class = "btn btn-default"><i class="fa fa-plus-square"></i>&nbsp;Add</a>
					<a href="./Excels/employeeexcel.php" class="btn btn-default btn-lg " role="button" ><i class="fa fa-file-excel-o"></i> export</a>
				</p>
				
					Search:<input id="filter" type="text" /> 
			<table data-filter="#filter" class="footable">
		              <thead>
		                <tr>
		                  <th> Name</th>
		                  <th> Phone</th>
		                  <th> Email</th>
		                  <th> Role</th>
		                  <!--<th> Base Salary</th>
		                    <th>Created Date</th>
		                  <th>Updated Date</th>
		                   <th>Description</th>-->
		                   <th data-sort-ignore="true">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
		               $path = $_SERVER['DOCUMENT_ROOT'];
   					   $path .= "/layout/connection/GlobalCrud.php";
   					   include_once($path);
					   $data = GlobalCrud::getData('employeeSelect');
					   foreach ($data as $row) {
					   	$emailTd = '<td></td>';
					   	if(!empty($row['email'])){
					   		$emailTd = '<td> <i class="fa fa-envelope"></i> '. $row['email'] . '</td>';
					   	}
					   	$phoneTd = '<td></td>';
					   	if(!empty($row['phone'])){
					   		
					   			$phoneTd = '<td> <i class="fa fa-phone"></i> '. $row['phone'].'</td>';
					   		}
					   	
						   		echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo $phoneTd;
							   	echo $emailTd;
							   	echo '<td>'. $row['role'] . '</td>';
							   	//echo '<td>'. $row['base_salary'] . '</td>';
							   //	echo '<td>'. $row['created_date'] . '</td>';
							   //	echo '<td>'. $row['updated_date'] . '</td>';
							   	//echo '<td>'. $row['description'] . '</td>';
							   	echo '<td nowrap="nowrap">';
							   	echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
							   	echo '<a href="?content=15&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
							   	echo '<a href="?content=13&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   	echo '</td>';
							   	echo '</tr>';
					   }

					   function deleteRecord($idValue) {
									$sql = "employeeDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=13");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  }
					  ?>
				      </tbody>
	            </table>
	            <label id="NoRowsAvailable" style="display: none">  No result matched for search criteria	</label>
    	</div>
    </div> <!-- /container -->
  </body>
</html>