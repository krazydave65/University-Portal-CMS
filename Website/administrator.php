<?php
include ("bootstraptemp.class.php");
session_start();
$page= new bootstrap();
$page->get_header("Administrator");


    echo    "1. (COMPLETE) Review the course schedule.<br>
             2. (COMPLETE) Make changes to the course schedule: (add & delete) courses from course schedule <br>
             3. (COMPLETE) Review & Modify the details of a given course <br> 
             4. (COMPLETE) List all course sessions <br> 
             5. (COMPLETE) Add/Delete a couse session to/from a course<br>";

     ?>



     <!-- Use Case1: -->
     <ul class='nav nav-pills nav-stacked'>

        <li>
            <form action="controler.php?id=1" method="post">
              <input type="submit" value="Access Courses" class="btn btn-block btn-lg btn-success">
            </form>
        </li>
    </ul>

    <?php   

    if (isset($_POST['submit_edit'])) {
      print_r($_POST['submit_edit']);
   }


$page->get_footer();


?>


