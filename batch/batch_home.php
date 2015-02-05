<!DOCTYPE html>
<html lang="en">
<head>


</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<h3>Batch</h3>
		</div>
		<div class="row">
			<p>
				<a href="?content=11" class="btn btn-default"><i
					class="fa fa-plus-square"></i>&nbsp;Add</a> <a
					href="./Excels/batchexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /> <label id="DeletedRecord" style="display: none">Record Deleted successfully!!</label>
			<table data-filter="#filter" class="footable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Technology Name</th>
						<th>Trainer Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Time</th>
						<th>Duration</th>
						<th>Status</th>
						<!--<th>Created Date</th>  
						<!--<th>Updated Date</th> 
						<th>Description</th>-->
						<th data-sort-ignore="true">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					header("Cache-Control:no-cache");
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once($path);
					$delete="batchDelete";
					$count=0;
					$data = GlobalCrud::getData('batchSelect');
					foreach ($data as $row) {
						echo '<tr>';
						echo '<td>'. $row['id'] . '</td>';
						echo '<td>'. $row['technology_name'] . '</td>';
						echo '<td>'. $row['trainer_name'] . '</td>';
						echo '<td>'. $row['start_date'] . '</td>';
						echo '<td>'. $row['end_date'] . '</td>';
						echo '<td>'. $row['time'] . '</td>';
						echo '<td>'. $row['duration'] . '</td>';
						echo '<td>'. $row['status'] . '</td>';
						echo '<td>';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=12&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
						//echo '<a href="?content=10&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome('.$row['id'].',"batchDelete") > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '</td>';
						echo '</tr>';
						$count++;
					}

					/* function deleteRecord($idValue) {
									$sql = "batchDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=10");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  } */
						  ?>
						    <br> Total number of batches:
					<?php echo $count;?>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none">  No result matched for search criteria	</label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
