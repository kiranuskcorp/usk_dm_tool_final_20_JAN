<!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<title>Usk Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.min.css" rel="stylesheet">

<link href="./css/asterisk.css" rel="stylesheet" type="text/css" />
<link href="./css/fa/css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable-0.1.css" rel="stylesheet"
	type="text/css" />
	
<link href="./css/foot/footable.sortable-0.1.css" rel="stylesheet"
	type="text/css" />

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>
<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
<script src="./js/foot/footable-0.1.js" type="text/javascript"></script>
<script src="./js/foot/footable.sortable.js" type="text/javascript"></script>
<script src="./js/foot/footable.filter.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
      $('table').footable(



    	      );
    });

    $(document).ready(function(){
        $('#dialog').hide();
        var i=1;
       $("#add_row").click(function(){
        $('#addr'+i).html("<td><input name='contactId[]' type='hidden' value='0'/><input name='poc[]' type='text' placeholder='poc' class='form-control input-md'  /> </td><td><input  name='email[]' type='email' placeholder='email'  class='form-control input-md'></td><td><input  name='phone[]' type='text' placeholder='phone' onkeypress='return event.charCode >= 48 &amp;&amp; event.charCode <= 57' class='form-control input-md'></td><td>&nbsp;<a  onClick='delRow(0)'><i class='fa fa-minus-square'></i></a></td>");

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

 function MatchIgnoreCase(strTerm, strToSearch) 
 { 
 	strToSearch = strToSearch.toLowerCase(); 
 	strTerm = strTerm.toLowerCase(); 
 	if(strToSearch==strTerm) 
 	{ 
 		return true; 
 	} else { 
 		return false; 
 	} 
 }
     function validateUser(tablename) {
     	var name = document.getElementById("name").value;
     	// alert("Name"+name.length); 
         if(name.length>=3){
         	$.ajax({
         		  url: '/layout/connection/GlobalCrud.php',
         		  type: 'POST',
         		  data: {operation: "duplicate", sql: "select * from "+tablename+" where name like  '"+name+"%'" , sqlValues:""},
         		  success: function(response) {
         		  	var splitted = response.split(",", 1);

         		  var result = MatchIgnoreCase(name,splitted+"");
         		  	$('#createMessage').css("display", "none");
         			if(result){
         				
         		  		$('#create').hide();
         		  		$('#update').hide();
         		  		$('#createMessage').css("display", "block");
         		  	}
         			else{
         				$('#create').show();
         				$('#update').show();
         				$('#createMessage').css("display", "none");
             			}
         		  },
         		  error: function(e) {
         		  }
         		});
 		
     	   	} 
     }

     function getTheEmail(tablename) {
      	var name = document.getElementById("assignedtoid").value;
        
          	$.ajax({
          		  url: '/layout/connection/GlobalCrud.php',
          		  type: 'POST',
          		  data: {operation: "email", sql: "select * from "+tablename+" where id = '"+name+"'" , sqlValues:""},
          		  success: function(response) {
          		  	var splitted = response.split(",", 1);
					
					document.getElementById("employeeEmail").value = splitted;
          		//  var result = MatchIgnoreCase(name,splitted+"");
          		  	
          		  },
          		  error: function(e) {
          		  }
          		});
  		
      	   
      }

     function supportTracking() {
        
       	 var supportby = $("#supportTrackingSupportby").val(); 
         var supportto = $("#supportTrackingSupportto").val();
         var date = $("#supportTrackingDate").val();
         var hours = $("#supportTrackingHours").val();
         var description = $("#supportTrackingDescription").val();
         var arrayValues = [supportby,supportto,date,hours,description];
           	$.ajax({
           		  url: '/layout/connection/GlobalCrud.php',
           		  type: 'POST',
           		  async: false,
           		  data: {operation: "supportTracking", sql: "supportTrackerInsert",sqlValues : arrayValues },
           		  success: function(response) {
               		  

           			  $("#AddRecord").css("display", "block");
           			 setTimeout(function(){
      				   $("#AddRecord").css("display", "none");
      			      },5000);

           		  return false;
           		  },
           		  error: function(e) {
               	   return false;
           		  }
           		});
   		
       	   
       }


     
    function delFromHome(id,sqlCon)
    {
    	
    	 var current = window.event.srcElement;
     	var answer =  confirm("Are you sure you want to delete?");
    		if(answer){
    	$.ajax({
    		   type: "POST",
    		   url: "/layout/connection/GlobalCrud.php",
    		   data: {operation: "delete", sql: sqlCon, sqlValues: id},
    		   cache: false,
    		   success: function(){
    			   $("#DeletedRecord").css("display", "block");
    			   setTimeout(function(){
    				   $("#DeletedRecord").css("display", "none");
    			      },1000);
    			   while ( (current = current.parentElement)  && current.tagName !="TR");
    			              current.parentElement.removeChild(current);
    		  },error: function(){
    			
    		  }
    		 
    		 });
    		}
    	
    }


 
    	

    
    function emailalert(batch,trainer,email)
    {
        $("#dialog").dialog();
      
        if(batch == 'trainee'){
        	var response = allAjaxCalls(batch,trainer,email,"getEmailcon");
        	
        	  var res =  response.split(',');
    			 $('#from').val(res[0]);
    			  $('#cc').val(res[1]);
    			  $('#bcc').val($("#hiddenEmailValue").val());    
    			  $('#subject').val(res[3]);
    			  $('#body').val(res[4]);

    			/*   var batchId = [];
    			  batchId[0] = email;
    			  var $response2 =  allAjaxCalls("traineeSelectByBatchId",batchId,email,"getAllRecordsBasedOnId");
    			 	console.log($response2); */
        	//GlobalCrud::getAllRecordsBasedOnId('traineeSelectByBatchId',array($_GET['BatchId']));
        }
        if(batch == 'batch'){
        	  $('#to').val(email); 
        	var response = allAjaxCalls(batch,trainer,email,"getEmailcon");
        	  var res =  response.split(',');
    			 $('#from').val(res[0]);
    			 $('#cc').val(res[1]);
    			 // $('#bcc').val(res[2]);    
    			  $('#subject').val(res[3]);
    			  $('#body').val(res[4]);
        }
     
        
    }

    function allAjaxCalls(batch,trainer,email,method){
		var returnResponse;
    	 $.ajax({
   		  url: '/layout/connection/GlobalCrud.php',
   		  type: 'POST',
   			async: false, 
   		  data: {operation: "emailcon", sql:batch, sqlValues:trainer , method:method,body:''},
   		  success: function(response) {
   	   		 
   			returnResponse = response;
        		  },error: function(e){
       			  console.log("error"+e);
       		  }
   		}); 
    		return returnResponse; 
    }

    function sendEmail(){
    	
    	var toEmail  =$('#to').val();
    	var subject =$('#subject').val();
    	var body =$('#body').val();
    	console.log(" "+body);
    	 $.ajax({
      		  url: '/layout/connection/GlobalCrud.php',
      		  type: 'POST',
      		 data: {operation: "emailsend", sql:toEmail, sqlValues:subject, body:body},
     		  success: function(response) {
     			 alert("Success");
     			$("#dialog").hide();
     		  },error : function(error){

     			 alert("error");
         		  }
         	    	 }); 
        }
     

    
  </script>
<style type="text/css">
.mainHeader {
	height: 100px;
}

#content {
	padding-top: 10px;
}

#nav {
	width: 100%;
	/* border : 1px solid black;  */
	background-color: #45aed0;
}

.navigation {
	width: 100%;
	height: 40px;
	padding: auto;
}

.navigation li a {
	color: white;
	/* background-color: #45aed0; */
	width: 100%;
}

.navigation li a:hover {
	background-color: black;
}

.required label:after {
	color: #e32;
	content: ' *';
	display: inline;
}

.li {
	display: inline;
	text-alig: right;
	list-style: none;
}

.form-group.required .control-label:after {
	content: "*";
	color: red;
}

.left {
	float: left;

	/* clear: left;
	position: relative;
	bottom: -50px; */
}

.right {
	float: right;
	padding-top: 40px;
	width: 60%;
	color: #45aed0;
	/*clear: right; */
}

#DeletedRecord {
	text-align: center;
	font-size: small;
	color: red;
}

#AddRecord {
	text-align: center;
	font-size: small;
	color: green;
}

.labelData {
	font-size: 25px;
	padding-top: 15px;
	color: #45aed0;
}

#dialog {
	height: 500px;
}
</style>
<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />
</head>
<body>

<?php
error_reporting ( 0 );
session_start ();
$username = $_SESSION ['username'];
if (! empty ( $username )) {
	?>


<div id="dialog" style="width: 500px;">

		<table class="table">


			<tr>
				<td><p>
						From: <input type="text" id="from" value="">


					</p></td>

			</tr>
			<tr>
				<td><p>
						To:- <input type="text" id="to" value="">
					</p></td>

			</tr>
			<tr>
				<td><p>
						cc:- <input type="text" id="cc" value="">
					</p></td>

			</tr>
			<tr>
				<td><p>
						Bcc:- <input type="text" id="bcc" value="">
					</p></td>

			</tr>
			<tr>
				<td>Subject <input type="text" id="subject" value=""></td>

			</tr>
			<tr>
				<td><textarea id="body" rows="4" cols="23">
				
						</textarea></td>

			</tr>
			<tr>
				<td><button onclick="sendEmail()">Send</button></td>

			</tr>
		</table>




	</div>

	<!-- Begin Wrapper -->
	<div class="container-fluid">

		<div class="mainHeader">
			<ul class="li">

				<li class="left"><img src="./img/logo_blue.gif" /></li>
				<li class="right"><h1>Data Management Tool</h1></li>

			</ul>
		</div>
		<!-- Begin Header -->
		<!-- 	<h2>Data Management Tool <img src="./img/logo.gif" align="right" width="100px"></h2> -->
		<!-- End Header -->
		<!-- Begin Naviagtion -->



		<div id="nav">
			<div class="navigation">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<ul class="nav">
						<?php include 'menu.php';?>
					</ul>
					</div>
				</nav>

			</div>
		</div>
		<!-- <div align="right">
		
Welcome to <?php  // echo $_SESSION['username'];?><br> <a href="login.php"
				class="logout">logout</a>
		</div>

		<!-- End Naviagtion -->
		<!-- Begin Content -->


		<div id="content">
			<?php

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
		
		case 43 :
			include './dashboard/dashboard.php';
			break;
	
			/* Support tracker */
			case 47 :
				include './supporttracker/supporttracker_home.php';
				break;
				
				case 100 :
					include './supporttracker/default_home.php.php';
					break;
				
		default :
			include './dashboard/dashboard.php';
			break;
	}
} else {
	include './login.php';
}
?>
		</div>
		<!-- Begin Content -->
	</div>
	<!-- End Wrapper -->
</body>
</html>
