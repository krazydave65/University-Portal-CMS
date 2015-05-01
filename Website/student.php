<?php
include ("bootstraptemp.class.php");
session_start();
$page= new bootstrap();
$page->get_header("student");
                        
                     // Use Case1:
                     echo "<ul class='nav nav-pills nav-stacked'>";
                       echo "<li role='presentation'><a href='controler.php?id=1'>List all the course sessions being offered</a></li>";
                     echo "</ul>";
                     echo "<br>"; 
                     //echo "<a href='controler.php?id=1'>List all the course sessions being offered</a><br><br>";

                     // Use Case2:
                     echo "<div class='panel panel-primary'>";
                     echo "<div class='panel-heading'>";
                     echo "<h3 class='panel-title'>Review the details of a course session</h3>";
                     echo "</div>";
                     echo "<div class='panel-body'>";                  
                            echo "<form action='controler.php?id=2' method='POST'>";
                            echo " Course Number: ","<input type='text' name='courseid' />";
                            echo "<input type='submit' value='Search'/>"; 
                            echo "</form>";     
                     echo "</div>";
                     echo "</div>";






                        // Use Case3: 
                        echo "<a href='student.enroll.php'>Enroll to a particular session</a><br><br>";
                        
                        // Use Case4:
                        echo "<a href='student.uploader.php'>Upload the homework/term project for a course session</a><br><br>";


                        // Use Case5:
                        echo "<div class='panel panel-primary'>";
                        echo "<div class='panel-heading'>";
                        echo "<h3 class='panel-title'>Review course material for a course session</h3>";
                        echo "</div>";
                        echo "<div class='panel-body'>";                    
                            echo "<form action='controler.php?id=5' method='POST'>";
                            echo " Course Number: ","<input type='text' name='courseid2' />";
                            echo "<input type='submit' value='Show Material'/>"; 
                            echo "</form>";
                        echo "</div>";
                        echo "</div>";

                        

                        // Use Case6:
                        echo "<div class='panel panel-primary'>";
                        echo "<div class='panel-heading'>";
                        echo "<h3 class='panel-title'>Review student's grades</h3>";
                        echo "</div>";
                        echo "<div class='panel-body'>";                           
                            echo "<form action='controler.php?id=6' method='POST'>";
                            echo " CWID: ","<input type='text' name='cwid' />";
                            echo "<input type='submit' value='Show Grades'/>"; 
                            echo "</form>"; 
                        echo "</div>";
                        echo "</div>";


                
                          
$page->get_footer();




?>


