<!DOCTYPE html>
<html lang="en">

<body>
	<div class="container-fluid">
		<div class="row">
			<h3>Client</h3>
		</div>
		<div class="row">
			<p>
				<a href="?content=8" class="btn btn-default"><i
					class="fa fa-plus-square"></i>&nbsp;Add</a> <a
					href="./Excels/clientexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /> <label id="DeletedRecord" style="display: none">Record Deleted successfully!!</label>
			<table data-filter="#filter" class="footable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<!-- <th>Created Date</th>
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
					$data = GlobalCrud::getData('clientSelect');
					foreach ($data as $row) {
						$addressTd = '<td></td>';
						if(!empty($row['address'])){
								
							$addressTd = '<td> <i class="fa fa-location-arrow"></i> '. $row['address'].'</td>';
								
						}
						echo '<tr>';
						echo '<td>'. $row['name'] . '</td>';
						echo $addressTd;
						echo '<td>';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=9&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
						//echo '<a href="?content=7&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome('.$row['id'].',"courseDelete") > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '</td>';
						echo '</tr>';
					}

					 /* function deleteRecord($idValue) {
									$sql = "clientDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=7");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  } */
						  ?>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none">  No result matched for search criteria	</label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
