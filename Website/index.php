<?php
  /*	include("functions.php");

	$username =  isset($_POST["username"]) ? $_POST["username"] : "";
    $password =  isset($_POST["password"])  ? $_POST["password"] : "";
    $message = "";
		if(isset($_POST["submit"])){
			if ($username == "cs431s6" && $password == "otohjoom") {
				redirect_to("administrator.php?id=5");
	                }
                        else{
	                       $message = "The Username/Password was incorrect";   
	                }
		}
  */
?>

<html>
<head>
<title>2015 Semester Project</title>

<!-- BOOTSTRAP LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- END OF BOOTSTRAP -->
</head>

<body>
	<div class="container">
		<div class="jumbotron">
    		<h1>431 PHP Term Project</h1>
			<h3>Home Page</h3>

			<!-- <ul>
				<li><a href="secondPage.php"> <?php echo $link_name; ?> </a></li>
				<li><a href="update.php"> Update Page </a></li>
			</ul> -->
		</div>
	</div>



	<div class="container">
		


		<!-- <div class="container">
			<h3>Log In</h3>
		</div> -->
			<h2>Log In</h2>

            <?php 
	      /*	<!-- Student Form -->
		<form class="form-inline" action="student.php" method="post">
			<h4>Student</h4>
		    <div class="form-group">
		        <label class="sr-only" for="inputUsername">Username</label>
		        <input type="username" class="form-control" id="inputUsername" placeholder="Username">
		    </div>
		    <div class="form-group">
		        <label class="sr-only" for="inputPassword">Password</label>
		        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
		    </div>
		    <button type="submit" class="btn btn-primary" value="student" >Login</button>
		</form>  


		<!-- Faculty Form -->
		<form class="form-inline" action="faculty.php" method="post">
			<h4>Faculty</h4>
		    <div class="form-group">
		        <label class="sr-only" for="inputUsername">Username</label>
		        <input type="username" class="form-control" id="inputUsername" placeholder="Username">
		    </div>
		    <div class="form-group">
		        <label class="sr-only" for="inputPassword">Password</label>
		        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
		    </div>
		    <button type="submit" class="btn btn-primary" value="faculty">Login</button>
		</form>  
            */
           ?>
		<!-- Administration Form -->
		<form class="form-inline" action="login.php" method="post">
			<h4></h4> <h4 style="color:red;"><?php echo $message ?></h4>
		    <div class="form-group">
		        <label class="sr-only" for="inputUsername">Username</label>
		        <input class="form-control" name="username" placeholder="Username" required>
		    </div>
		    <div class="form-group">
		        <label class="sr-only" for="inputPassword">Password</label>
		        <input type="password" class="form-control" name="password" placeholder="Password" required>
		    </div>
		    <button type="submit" class="btn btn-primary" value="Submit" name="submit">Login</button>
		</form>  





		<!-- Choose the type of user:<br>
		<form action="faculty.php" method="post">
		<button name="User" type="submit" value="faculty">Faculty</button>
		</form>
		<form action="student.php" method="post">
		<button name="User" type="submit" value="student">Student</button>
		</form>
		<form action="administrator.php" method="post">
		<button name="User" type="submit" value="admin">Administrator</button>
		</form> -->

	</div>

</body>

</html>
