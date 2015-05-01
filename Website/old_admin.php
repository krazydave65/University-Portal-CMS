<?php
	include("functions.php");

	$conn = connect_db();

	// $conn = connect_db();
	// $sql = "SELECT * FROM _course_session";
	// $result = $conn->query($sql);
	// close_db($conn);


	if (isset($_POST["submit_admin"])) {
		$id = $_POST["id"];
		$num = $_POST["num"];
		$title = $_POST["title"];
		$description = $_POST["description"];
	}
	else if(!isset($_GET["id"])){
		redirect_to("index.php");
	}
	


?>

<html>
<head>
<title>Admin Page</title>

<link rel="stylesheet" type="text/css" href="_css/styles.css">

<!-- BOOTSTRAP LINKS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- END OF BOOTSTRAP -->
	<script type="text/javascript">
		function loadXMLDoc(){
			var xmlhttp;
			// Check browser compatibility for XMLHttpRequest
			if (window.XMLHttpRequest) {xmlhttp = new XMLHttpRequest();}
			else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
			
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status==200){
					document.getElementById("myDiv").innerHTML= xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST","data.php",true);
			xmlhttp.send();
		}


	function showModal(){
		$("#myModal").modal('show');
	}
	
</script>
</head>

<body>
<div class="container">
		<div class="jumbotron">
    		<h1>Administrator Account</h1>
    		<a href="index.html">Sign Out</a>

			<!-- <ul>
				<li><a href="secondPage.php"> <?php echo $link_name; ?> </a></li>
				<li><a href="update.php"> Update Page </a></li>
			</ul> -->
		</div>
	</div>


	<div class="container"> 
	<div ><h2 id="myDiv">Let AJAX Change this text</h2></div>
	<button type="button" onclick="loadXMLDoc()">Change Content</button>
	<br>


		<?php
			echo 	"1. (DONE) Review the course schedule.<br>
					 2. Make changes to the course schedule: (add & delete) courses from course schedule <br>
					 3. Review & Modify the details of a given course <br> 
					 4. List all course sessions <br> 
					 5. Add/Delete a couse session to/from a course<br>";
		?>



		<?php
			

		?>


		<!-- <div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Edit Class Information</h4>
	            </div>
	            <div class="modal-body">
	            

					  <h2>Edit Course Information</h2>

					  <form role="form" action="administrator.php" method="post">

					    <div class="form-group">
					      <label for="email">ID:</label>
					      <input type="text" name="id" class="form-control"  placeholder="Enter ID">
					    </div>

					    <div class="form-group">
					      <label for="pwd">Number:</label>
					      <input type="number" name="num" class="form-control" placeholder="Enter Number" >
					    </div>

					    <div class="form-group">
					      <label for="pwd">Title:</label>
					      <input type="text" name="title" class="form-control" placeholder="Enter Title">
					    </div>

					    <div class="form-group">
					      <label for="pwd">Description:</label>
					      <input type="text" name="description" class="form-control" placeholder="Enter Description">
					    </div>					    

					    <button type="submit" class="btn btn-default" name="submit_admin">Submit</button>
					  </form>


	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary">Save changes</button>
	            </div>
	        </div>
	    </div>
	</div> -->



	<div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                <h4 class="modal-title">Delete Course</h4>
	            </div>
	            <div class="modal-body">
					 	<h4> Are you sure you want to delete this course?</h4>  
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <form role="form" action="old_admin.php?id=13" method="post">
		                <button type="submit" name="deleted" class="btn btn-danger">Delete Course</button>
	           		</form>
	            </div>
	        </div>
	    </div>
	</div>


			<h2>Courses</h2>
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Number</th>
					<th>Title</th>
					<th>Description</th>
				</thead>
				<tbody>

					<?php //*********START************// 
						$sql = "SELECT * FROM _course";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
					?>
					<tr id="<?php echo  $row["course_id"];  ?>" >
						<td> <?php echo $row["course_id"]; ?> </td>
						<td> <?php echo $row["course_number"]; ?> </td>
						<td> <?php echo $row["course_title"]; ?> </td>
						<td> <?php echo $row["description"]; ?> </td>
						<td><button <?php echo  $row["course_id"];  ?> onclick="showModal()">Edit</button></td>
					</tr>

					<?php  } } //*******END********// ?>
				</tbody>
			</table>




			<h2>Scheduled Course</h2>
			<table class="table">
				<thead>
					<th>Session</th>
					<th>Course ID</th>
					<th>Instructor</th>
					<th>Date/Time</th>
				</thead>
				<tbody>

					<?php //*********START************// 
						$sql = "SELECT * FROM _course_session";
						$result = $conn->query($sql);
						$row_num = 0;
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$row_num++;
					?>
					<tr id="<?php echo $row_num ?>">
						<td> <?php echo $row["session"]; ?> </td>
						<td> <?php echo $row["course_id"]; ?> </td>
						<td> <?php echo $row["instructor"]; ?> </td>
						<td> <?php echo $row["date_time"]; ?> </td>
					</tr>

					<?php  } } //*******END********// ?>
				</tbody>
			</table>

	</div>


</body>
</html>

<?php
	close_db($conn);
?>


