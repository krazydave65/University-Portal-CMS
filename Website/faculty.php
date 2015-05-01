<?php
include("bootstraptemp.class.php");
session_start();
$page= new bootstrap();
$page->get_header("Faculty");

                        echo "<form action='controler.php' method='POST'>";
                        echo "<p>";
                        echo "<input type='radio' name='radio1' value=1> List all the course sessions being taught by the faculty<br>";
			echo "<input type='radio' name='radio1' value=1> Review the detail of a particular course<br>";
			echo "<input type='radio' name='radio1' value=1> Upload the course material/sylabus for a course session<br>";
			echo "<input type='radio' name='radio1' value=1> Download students' homework/term project for a course session<br>";
			echo "<input type='radio' name='radio1' value=1> Enter students' scores for each student<br>";
                        echo "</p>";
                        echo "<input type='submit' value='Submit'/>"; 
                        echo "</form>";


$page->get_footer();




/*
<html>
<head>
<title>Faculty Page</title>

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
    		<h1>Faculty Account</h1>
			<a href="index.html">Sign Out</a>

			<!-- <ul>
				<li><a href="secondPage.php"> <?php echo $link_name; ?> </a></li>
				<li><a href="update.php"> Update Page </a></li>
			</ul> -->
		</div>
	</div>
	<div class="container"> 
		<?php
			echo "List all the course sessions being taught by the faculty<br>";
			echo "Review the detail of a particular course<br>";
			echo "Upload the course material(/sylabus) for a course session<br>";
			echo "Download students' homework/term project for a course session<br>";
			echo "Enter students' scores for each student<br>"
		?>
	</div>
</body>
</html>
*/
?>

