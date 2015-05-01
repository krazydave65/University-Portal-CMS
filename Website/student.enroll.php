<?php
include ("classes.class.php");
include ("bootstraptemp.class.php");
$page= new bootstrap();
$student= new student();

$page->get_header("Student");
$page->get_body_title("-Enroll-");

echo "<div class='container'>";
echo  "<p>All Sessions Being offered:</p>"; 
                                         
echo  "<table class='table table-striped table-bordered table-hover table-condensed'>";
 echo "<thead>";
   echo "<tr>";
        echo "<th>Course ID</th>";
        echo "<th>Session ID</th>";
        echo "<th>Course Number</th>";
        echo "<th>Course Title</th>";
   echo "</tr>";
 echo "</thead>";
 echo "<tbody>";
    $student->showAllSessions();
 echo "</tbody>";
 echo "</table>";

echo "</div>";




                            echo "<form action='controler.php' method='POST'>";
                            echo "<input type='hidden' name='id' value='3'>";
                            echo " CWID Number: ","<input type='text' name='cwid' />";
                            echo " Course Number: ","<input type='text' name='courseid' />";
                            echo " Session Number: ","<input type='text' name='sessionid' />"," ";
                            echo "<input type='submit' value='Enroll'/>"; 
                            echo "</form>";

$page->go_back("student.php");
$page->get_footer();
?>