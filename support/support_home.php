<!DOCTYPE html>
<html lang="en">


<body>
	<div class="container-fluid">
		
		<div class="row">
			<p>
			<b class="labelData">Support</b>
				<a href="?content=41" class="btn btn-default"><i
					class="fa fa-plus-square"></i>&nbsp;Add</a> <a
					href="./Excels/supportexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /> <label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>
			<table data-filter="#filter" class="footable" id="myTable">
				<thead>
					<tr>
						<th>Trainee Name</th>
						<th>Employee Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Allotted Time</th>
						<th>End Client</th>
						<th>Technology Used</th>
						<th>Status</th>
						  <!-- <th>Description</th>
 -->
						<th data-sort-ignore="true">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php 
					//header("Cache-Control: no-cache");
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once($path);
					$delete = "supportDelete";
					$data = GlobalCrud::getData('supportSelect');
					$count = 0;
					foreach ($data as $row) {
						$end_dateTd='<td>'. $row['end_date'] . '</td>';
						if($row['end_date'] == '0000-00-00'){
							$end_dateTd='<td></td>';
						}
						echo '<tr>';
						echo '<td>'. $row['trainee_name'] . '</td>';
						echo '<td>'. $row['employee_name'] . '</td>';
						echo '<td>'. $row['start_date'] . '</td>';
						echo $end_dateTd;
						echo '<td>'. $row['allotted_time'] . '</td>';
						echo '<td>'. $row['end_client'] . '</td>';
						echo '<td>'. $row['technology_used'] . '</td>';
						echo '<td>'. $row['status'] . '</td>';
						//	echo '<td>'. $row['description'] . '</td>';
						echo '<td  nowrap="nowrap">';
						//echo '<a href="#" data-toggle="tooltip" title="'.$row['status'].'"><i class="fa fa-envelope"></i></a>';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=42&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
						//echo '<a href="?content=40&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome('.$row['id'].',"supportDelete")  > <i class="fa fa-trash"></i></a>';
						echo '</td>';
						echo '</tr>';
						$count++;
					}

					/* function deleteRecord($idValue) {
									$sql = "supportDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=40");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  } */
						  ?>
						  
						  <br> Total Number Of Supports:
					<?php echo $count;?>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none">  No result matched for search criteria	</label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
