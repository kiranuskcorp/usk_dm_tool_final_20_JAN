
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link   href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
 
</head>

<body>
<div class="container">
<div class="row">
<h3>Trainee</h3>
</div>
<div class="row">
<p>
<a href="?content=38" class = "btn btn-default"><i class="icon-plus-sign"></i>Add</a>
</p>

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Trainee Name</th>
<th>Email</th>
<th>Phone</th>
<th>Alternate Phone</th>
<th>Technology Name</th>
<th>Batch Id</th>
<th>Client Name</th>
<th>Skype Id</th>
<th>Time Zone</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$data = GlobalCrud::getData('traineeSelect');
foreach ($data as $row) {
	echo '<tr>';
	echo '<td>'. $row['name'] . '</td>';
	echo '<td>'. $row['email'] . '</td>';
	echo '<td>'. $row['phone'] . '</td>';
	echo '<td>'. $row['alternate_phone'] . '</td>';
	echo '<td>'. $row['technology_name'] . '</td>';
	echo '<td>'. $row['batch_id'] . '</td>';
	echo '<td>'. $row['client_name'] . '</td>';
	echo '<td>'. $row['skype_id'] . '</td>';
	echo '<td>'. $row['timezone'] . '</td>';
	echo '<td>'. $row['description'] . '</td>';
	echo '<td>';
	echo '<a href="?content=39&id='.$row['id'].'"><i class="icon-edit"></i></a>';
	echo '<a href="?content=37&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" ><i class="icon-trash"></i></a>';//'?content=16&id='.$row['id'].'
	echo '</td>';
	echo '</tr>';
}

function deleteRecord($idValue) {
	$sql = "traineeDelete";
	$sqlValues = $idValue;
	GlobalCrud::delete($sql,$sqlValues);
	header("Location:./?content=37");
}

if (isset($_GET['id'])) {
	deleteRecord($_GET['id']);
}
?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>