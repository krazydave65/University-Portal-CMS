<?php
//This is the Main controler calles other classes and generate views.
include("classes.class.php");
include("bootstraptemp.class.php");

session_start();
$role=$_SESSION['role'];


if ($role=="student"){
   //calling instances of student class, and bootstrap page class.
   $page= new bootstrap();
   $student= new student();

   //filtering input from prev page. Using either GET or POST 
   $input=$_GET['id'];
   if (isset($_POST['id'])){
     $input=$_POST['id'];
   }

   switch ($input){
     case 1:
        //create a bootstrap page header.
        $page->get_header("Student");
        $page->get_body_title("-All Course Sessions-");
        
        //get the results from DB, This function is in Classes.class.php file. Also creating a table view.
       //table:
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
       //End table.        
        //create page footer.
        $page->go_back("student.php");        
        $page->get_footer();
        break;
 
     case 2:  
        $course_id=$_POST['courseid'];
        $page->get_header("Student");
        $page->get_body_title("-Course Details-");
        $student->courseDetails($course_id);
        $page->go_back("student.php");
        $page->get_footer();
        break;

     case 3://Enroll:
         $cwid=$_POST['cwid'];
         $course_id=$_POST['courseid'];
         $session_id=$_POST['sessionid']; 
         $page->get_header("Student");
         $page->get_body_title("-Enroll-");
         $student->enroll($cwid,$course_id,$session_id); 
         $page->go_back("student.enroll.php");
         $page->get_footer();
         break;

     case 4://Upload:
         break;

     case 5:

         $course_id=$_POST['courseid2']; 
         $page->get_header("Student");
         $page->get_body_title("-Course Material-");
         $student->viewCourseMaterial($course_id);
         $page->go_back("student.php");
         $page->get_footer();
         break;
 
     case 6:
         $cwid=$_POST['cwid'];
         $page->get_header("Student");
         $page->get_body_title("-Student Grades-");
         $student->viewGrades($cwid);
         $page->go_back("student.php");
         $page->get_footer();
         break;
   }
}


elseif ($role=="faculty"){

}



elseif ($role=="admin"){

  //calling instances of student class, and bootstrap page class.
   $page= new bootstrap();
   $admin = new admin();
   $student= new student();

   //filtering input from prev page. Using either GET or POST 
   $input=$_GET['id'];


   // if (isset($_POST['id'])){
   //   $input=$_POST['id'];
   // }

   if(isset($_GET['delete'])){ // DELETE COURSE
      $id = $_GET['delete'];
      echo "Delete course with id = {$id}";
      $admin->delete_course($id);
   }

    



   switch ($input){
     case 1:

        //Add class to database if "ADD_CLASS_POST"
        if (isset($_POST['add_class_submit'])) {
          $id = $_POST['class_id'];
          $num = $_POST['num'];
          $title = $_POST['title'];
          $des = $_POST['description'];
          $admin->add_course($id,$num,$title,$des);
        }
        if (isset($_POST['submit_edit'])) {
          $id = $_POST['id'];
          $num = $_POST['num'];
          $title = addslashes($_POST['title']);
          $des = addslashes($_POST['desc']);
          $admin->update_course($id,$num,$title,$des);
        }



        //create a bootstrap page header.
        $page->get_header("Administrator");
        $page->go_back("administrator.php");        
        $page->get_body_title("All Courses");

        // $page->init_modal();

        
        //get the results from DB, This function is in Classes.class.php file. Also creating a table view.
       //table:
       echo "<div class='container'>";

       $page->init_jquery();
       ?>

            <form action="controler.php?id=2" method="post">
                  <input type="submit" value="Add Class" class="btn btn-success">
            </form>
<!--             <button type="submit" onclick="showModal()" value="Delete Class" class="btn btn-danger">Delete Class</button>
 -->
       <?php


      $page->init_modal();
      $page->init_editModal();
      // $page->addSessionModal();


      //========= Showing all courses ============
       echo  "<table class='table table-striped table-bordered table-hover table-condensed'>";
         echo "<thead>";
             echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>Number</th>";
                 echo "<th>Title</th>";
                 echo "<th>Description</th>";
                 echo "<th>Edit</th>";
             echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
             $admin->showAllCourses();
         echo "</tbody>";
       echo "</table>";
       echo "</div>";


       echo "<h3>Course Sessions</h3>";
       echo  "<table class='table table-striped table-bordered table-hover table-condensed'>";
         echo "<thead>";
             echo "<tr>";
                 echo "<th>ID</th>";
                 echo "<th>Session</th>";
                 echo "<th>Class</th>";
                 echo "<th>Faculty Name</th>";
                 echo "<th>Date/Time</th>";
                 echo "<th>Edit</th>";
             echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
             $admin->showAllSessions();
         echo "</tbody>";
       echo "</table>";
       echo "</div>";
       //End table.        
        //create page footer.
        $page->get_footer();
        break;


    case 2: //ADD COURSE
        $page->get_header("Administrator");
        $page->go_back("controler.php?id=1");        
        $page->get_body_title("Add New Course");

        $page->init_form();

        $page->get_footer();
        break;

   }
   
        
}

else{
  echo "$role was not detected";
}

?>