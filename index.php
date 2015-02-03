<!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<title>Usk Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.min.css" rel="stylesheet">

<link href=".css/asterisk.css" rel="stylesheet" type="text/css" />
<link href="./css/fa/css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable-0.1.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable.sortable-0.1.css" rel="stylesheet"
	type="text/css" />

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>
<script src="./js/foot/footable-0.1.js" type="text/javascript"></script>
<script src="./js/foot/footable.sortable.js" type="text/javascript"></script>
<script src="./js/foot/footable.filter.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
      $('table').footable(



    	      );
    });

    $(document).ready(function(){
        var i=1;
       $("#add_row").click(function(){
        $('#addr'+i).html("<td><input name='contactId[]' type='hidden' value='0'/><input name='poc[]' type='text' placeholder='poc' class='form-control input-md'  /> </td><td><input  name='email[]' type='text' placeholder='email'  class='form-control input-md'></td><td><input  name='phone[]' type='text' placeholder='phone'  class='form-control input-md'></td><td>&nbsp;<a  onClick='delRow(0)'><i class='fa fa-minus-square'></i></a></td>");

        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    });
      

    });


    function delRow(id)
    {
      var current = window.event.srcElement;
      //here we will delete the line
      while ( (current = current.parentElement)  && current.tagName !="TR");
                 current.parentElement.removeChild(current);
                 if(id != 0){
                	var main =  document.getElementById("deleteRecords").value;
                	if(main == ''){
                		document.getElementById("deleteRecords").value = id;
                	}else
                 document.getElementById("deleteRecords").value = main+","+id;      
                 }    
    }

    function validateUser(tablename) {
    	var name = document.getElementById("name").value;
    	// alert("Name"+name.length); 
        if(name.length>=3){
        	$.ajax({
        		  url: 'globalValue.php',
        		  type: 'POST',
        		  data: name+'name',
        		  success: function(data) {
            		  alert(data);
        			//called when successful
        			//$('#ajaxphp-results').html(data);
        		  },
        		  error: function(e) {
        			//called when there is an error
        			//console.log(e.message);
        		  }
        		});
		
    	   	} 
    }

   

    
  </script>
<style type="text/css">
.mainHeader{
height: 180px;
}
#nav{
border : 1px solid black;
}
.navigation {
	width: auto;
	color: #333;
	padding: auto;
	
}
.navigation li a:visited {
	text-decoration: none
}

.navigation li a:hover {
	background: #3498db;
	position: relative;
	color: #fff;
}
.required label:after {
	color: #e32;
	content: ' *';
	display: inline;
}
.li{
display:inline;
text-alig:right;
list-style: none;
}

.form-group.required .control-label:after {
	content: "*";
	color: red;
}
.left { 
float:left; 
width:50%; 
clear:left; 
position:relative;
bottom:-50px;
}

.right { 
float:right; 
width:50%; 
clear:right; 

}
</style>
</head>
<body>
<?php 
error_reporting(0);
session_start();
			$username = $_SESSION['username'];
			if (!empty($username)){
?>
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />



	<!-- Begin Wrapper -->
	<div class="container-fluid">
	
	<div class="mainHeader">
<ul class="li">
<li class= "left"><h1>Data Management Tool</h1></li>
<li class="right"><img src="./img/logo.gif" align="right"  width="250px" height ="180px"/></li>
</ul>
</div>
		<!-- Begin Header -->
	<!-- 	<h2>Data Management Tool <img src="./img/logo.gif" align="right" width="100px"></h2> -->
		<!-- End Header -->
		<!-- Begin Naviagtion -->
		
		<div id="nav"> 
	<div  class="navigation" >
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						<?php include 'menu.php';?>
					</ul>
				</div>
			</nav>

		</div>
		</div>
		<div align="right">
		
Welcome to <?php   echo $_SESSION['username'];?><br>
<a  href="login.php" class="logout">logout</a>
</div>

		<!-- End Naviagtion -->
		<!-- Begin Content -->
		
		
		<div id="content">
			<?php
			
			//$username = $_SESSION['username'];
			//if (!empty($username)){

			switch ($_GET ['content']) {
				/* technology */
				case 1 :
					include './technology/technology_home.php';
					break;
				case 2 :
					include './technology/create.php';
					break;
				case 3 :
					include './technology/update.php';
					break;

					/* Trainer */
				case 4 :
					include './trainer/trainer_home.php';
					break;
				case 5 :
					include './trainer/create.php';
					break;
				case 6 :
					include './trainer/update.php';
					break;

					/* Client */
				case 7 :
					include './client/client_home.php';
					break;
				case 8 :
					include './client/create.php';
					break;
				case 9 :
					include './client/update.php';
					break;

					/* Batch */
				case 10 :
					include './batch/batch_home.php';
					break;
				case 11 :
					include './batch/create.php';
					break;
				case 12 :
					include './batch/update.php';
					break;

					/* employee */
				case 13 :
					include './employee/employee_home.php';
					break;
				case 14 :
					include './employee/create.php';
					break;
				case 15 :
					include './employee/update.php';
					break;

					/* Resume */
					/*
					 * case 16 :
					* include '/resume/resume_home.php';
					* break;
					* case 17 :
					* include '/resume/create.php';
					* break;
					* case 18 :
					* include '/resume/update.php';
					* break;
					*/

					/* TODO */
				case 19 :
					include './todo/todo_home.php';
					break;
				case 20 :
					include './todo/create.php';
					break;
				case 21 :
					include './todo/update.php';
					break;

					/* Interview */
				case 22 :
					include './interview/interview_home.php';
					break;
				case 23 :
					include './interview/create.php';
					break;
				case 24 :
					include './interview/update.php';
					break;

					/* course */
				case 25 :
					include './course/course_home.php';
					break;
				case 26 :
					include './course/create.php';
					break;
				case 27 :
					include './course/update.php';
					break;

					/* recording */
					/*
					 * case 28 :
					* include '/recording/recording_home.php';
					* break;
					* case 29 :
					* include '/recording/create.php';
					* break;
					* case 30 :
					* include '/recording/update.php';
					* break;
					*/

					/* Pay slip */
					/*
					 * case 31 :
					* include '/payslip/payslip_home.php';
					* break;
					* case 32 :
					* include '/payslip/create.php';
					* break;
					* case 33 :
					* include '/payslip/update.php';
					* break;
					*/

					/* question */
				case 34 :
					include './question/question_home.php';
					break;
				case 35 :
					include './question/create.php';
					break;
				case 36 :
					include './question/update.php';
					break;

					/* Trainee */
				case 37 :
					include './trainee/trainee_home.php';
					break;
				case 38 :
					include './trainee/create.php';
					break;
				case 39 :
					include './trainee/update.php';
					break;

					/* Support */
				case 40 :
					include './support/support_home.php';
					break;
				case 41 :
					include './support/create.php';
					break;
				case 42 :
					include './support/update.php';
					break;

					/* client_contact */
					/* 	case 43 :
					 include './contact/contact_home.php';
					break;
					case 44 :
					include './contact/create.php';
					break;
					case 45 :
					include './contact/update.php';
					break;

					case 46 :
					include './Excels/excels.php';
					break; */

				default :
					include './trainee/trainee_home.php';
					break;
			}
			}else {
				include './login.php';
			}
			?>
		</div>
		<!-- Begin Content -->
	</div>
	<!-- End Wrapper -->
</body>
</html>
