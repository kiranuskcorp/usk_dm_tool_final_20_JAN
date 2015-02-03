<!DOCTYPE html>
<html lang="en">

<head>



</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<h3>Trainer</h3>
		</div>
		<div class="row">
			<p>
				<a href="?content=5" class="btn btn-default"> <i
					class="fa fa-plus-square"></i>&nbsp;Add
				</a> <a href="./Excels/trainerexcel.php"
					class="btn btn-default btn-lg " role="button"><i
					class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" />
			<table data-filter="#filter" class="footable">

				<thead>
					<tr>
						<th>Name</th>
						<th>Technology Name</th>
						<th>Phone</th>
						<th>Email</th>
						<!--   <th>Created Date</th>
		                   <th>Updated Date</th>
						<th>Description</th>-->
						<th data-sort-ignore="true">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$path = $_SERVER ['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once ($path);
					$data = GlobalCrud::getData ( 'trainerSelect' );
					foreach ( $data as $row ) {
						$emailTd = '<td></td>';
						if(!empty($row['email'])){
							$emailTd = '<td> <i class="fa fa-envelope"></i> '. $row['email'] . '</td>';
						}
						$phoneTd = '<td></td>';
						if(!empty($row['phone'])){

							$phoneTd = '<td> <i class="fa fa-phone"></i> '. $row['phone'].'</td>';

						}
						echo '<tr>';
						echo '<td>' . $row ['name'] . '</td>';
						echo '<td>' . $row ['technology_name'] . '</td>';
						echo $phoneTd;
						echo $emailTd;
						// echo '<td>'. $row['created_date'] . '</td>';
						// echo '<td>'. $row['updated_date'] . '</td>';
						//echo '<td>' . $row ['description'] . '</td>';
						echo '<td nowrap="nowrap">';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=6&id=' . $row ['id'] . '"> <i class="fa fa-pencil-square"></i></a>';
						echo '<a href="?content=4&id=' . $row ['id'] . '"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>'; // '?content=16&id='.$row['id'].'
						echo '</td>';
						echo '</tr>';

					}
					function deleteRecord($idValue) {
																	$sql = "trainerDelete";
																	$sqlValues = $idValue;
																	GlobalCrud::delete ( $sql, $sqlValues );
																	header ( "Location:./?content=4" );
																}

																if (isset ( $_GET ['id'] )) {
																	deleteRecord ( $_GET ['id'] );
																}
																?>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none"> No result matched
				for search criteria </label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
