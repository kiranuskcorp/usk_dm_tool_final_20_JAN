<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container-fluid">
		<div class="row">
    			<h3>Interview</h3>
    		</div>
			<div class="row">
				<p>
					<a href="?content=23" class = "btn btn-default"><i class="fa fa-plus-square"></i> Add</a>
					<a href="./Excels/interviewexcel.php" class="btn btn-default btn-lg " role="button" ><i class="fa fa-file-excel-o"></i> export</a>
				</p>
				
					search:<input id="filter" type="text" /> 
			<table data-filter="#filter" class="footable">
		              <thead>
		                <tr>
		                  <th>Employee Name</th>
		                  <th>Trainee Name</th>
		                  <th>Client Name</th>
		                  <th>End Client</th>
		                  <th> Date</th>
		                  <th>Time</th>
		                  <th>Status</th>
		                  <!-- <th>Description</th>
		                   --><th  data-sort-ignore="true">Actions</th>
		               </tr>
		              </thead>
		              <tbody>
		              <?php 
		               $path = $_SERVER['DOCUMENT_ROOT'];
   					   $path .= "/layout/connection/GlobalCrud.php";
   					   include_once($path);
					   $data = GlobalCrud::getData('interviewSelect');
					   foreach ($data as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['employee_name'] . '</td>';
						   		echo '<td>'. $row['trainee_name'] . '</td>';
							   	echo '<td>'. $row['client_name'] . '</td>';
							   	echo '<td>'. $row['interviewer'] . '</td>';
							   	echo '<td>'. $row['date'] . '</td>';
							   	echo '<td>'. $row['time'] . '</td>';
							   	echo '<td>'. $row['status'] . '</td>';
							   	//echo '<td>'. $row['description'] . '</td>';
							   	echo '<td>';
							   	echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
							   	echo '<a href="?content=24&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
							   	echo '<a href="?content=22&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   
							   	//echo '<i class="fa fa-info-circle">'. $row['description'] . '</i>';
							   	echo '</td>';
							   	echo '</tr>';
					   }

					   function deleteRecord($idValue) {
									$sql = "interviewDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=22");
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