<?php
include("functions.php");

class student{
    private $connection;

    //Constructor function to establish connection
    function __construct(){
         $this->connection=connect_db();   
     }


    //List all the course sessions being offered. 
    function showAllSessions(){
         $query="SELECT _course_session.course_id,_course.course_number, _course.course_title, _course_session.session FROM _course,_course_session WHERE _course.course_id=_course_session.course_id";
         $result=$this->connection->query($query);
         while ($row=$result->fetch_assoc()){
           // echo $row["course_id"],$row["session"],$row["course_number"],$row["course_title"],"</br>","</br>";
             $course_id= $row["course_id"];
             $session=$row["session"];
             $course_number=$row["course_number"];
             $course_title=$row["course_title"];   
      echo "<tr>";
      echo "<td> $course_id </td>";
      echo "<td> $session</td>";
      echo "<td> $course_number</td>";
      echo "<td> $course_title </td>";
      echo "</tr>";



         }
    } 



    //Review the details of a course session.
    function courseDetails($course_number){
          $query="SELECT _course_session.course_id,_course.course_title,_course_session.session,_course_session.instructor,_course_session.date_time FROM _course_session,_course WHERE _course.course_id=_course_session.course_id AND _course.course_number=?";
          $stmt=$this->connection->prepare($query);   //Prepared statment start
          $stmt->bind_param("i",$course_number);
          $stmt->execute();
          $stmt->bind_result($course_id,$course_title,$session,$instructor,$date_time);
          //Fetching all rows.     
          while($stmt->fetch()){ 
                 echo "Course #: ",$course_id," ","Title: ",$course_title," ","Session #: ",$session," ","Instructor: ",$instructor," ","Date&Time: ",$date_time,"</br>","</br>"; 
          }
    }

   
 
    //Enroll to a particular session.
    function enroll($cwid,$courseid,$session){
           $query="insert into _enrolled_student values($cwid,$courseid,$session)";
           $result=$this->connection->query($query);
           if ($result){
               echo $cwid," ","Enrolled successfully..";
            }
           else{
              echo "An error acured, please try again!";
            } 
    }



    //Upload the homework/term project for a course session.
    function uploadMaterial(){
          if(isset($_FILES['userfile'])) {
               // Make sure the file was sent without errors
               if($_FILES['userfile']['error'] == 0) {
       
                    // Gather all required data 
                    $name = $_FILES['userfile']['name'];
                    $type = $_FILES['userfile']['type'];
                    $content = $_FILES['userfile']['tmp_name'];   //this is the actual file
                     
                    // Create the SQL query
                    $query = "INSERT INTO _uploaded_mateirial('cwid','course_id','file_name', 'file_type','content')VALUES('$cwid','$courseID','$name', '$type','$content')";
 
                    // Execute the query
                    $result = $this->connection->query($query);
 
                    // Check if it was successfull
                    if($result) {
                           echo 'Success! Your file was successfully added!';
                    }
                    else {
                         echo 'Error! Failed to insert the file'
                         . "<pre>{$this->connection->error}</pre>";
                    }
               }
               else {
                    echo 'An error accured while the file was being uploaded. '
                    .'Error code: '. intval($_FILES['userfile']['error']);
               }
 
                            
          }
          else {
              echo 'Error! A file was not sent!';
          }  

    }



    //Review the course material for a course session.
    function viewCourseMaterial($course_id){
          $query= "SELECT * From _course_material WHERE course_id=?";
          $stmt=$this->connection->prepare($query);   //Prepared statment start
          $stmt->bind_param("i",$course_id);
          $stmt->execute();
          $stmt->bind_result($course_id,$syllabus,$course_material); 
          //Fetching all rows.     
          while($stmt->fetch()){
              echo "Course #: ",$course_id," ","Material: ",$course_material," ","Syllabus: ",$syllabus;
          } 
    }

  
  
    //Review student’s grades. 
    function viewGrades($cwid){
          $query="SELECT _course_score.course_id,_course.course_number,_course_score.attendence_score,_homework_score.homework_score,_course_score.project_score,_course_score.midterm_score,_course_score.final_score FROM _course,_course_score,_homework_score WHERE _course_score.CWID=_homework_score.CWID AND _course_score.course_id=_homework_score.course_id AND _course_score.CWID=?";
          $stmt=$this->connection->prepare($query);   //Prepared statment start
          $stmt->bind_param("i",$cwid);
          $stmt->execute();
          $stmt->bind_result($course_id,$course_number,$attendance,$hw,$proj,$mid,$final); 
          //Fetching all rows.     
          while($stmt->fetch()){
               //Total score.
               $total = $attend+$hw+$proj+$mid+$final;   
                //Printing results.
                echo "</br>","</br>","-Course: ",$course_number,"</br>"," Attendance: ",$attendance,"</br>".
                " Homework score: ",$hw,"</br>"," Term project score: ",$proj,"</br>".
                " Midterm: ",$mid,"</br>"," Final exam: ",$final,"</br>".
                " The Total score is: ",$total,"</br>","</br>";                      
            }
           //Error checking module to check if there is data or not.
           if ($stmt->num_rows == 0){
           echo "Error!","</br>","There is no data retrieved, or no such CWID was found...","</br>","Please try again using a valid CWID, a valid CWID is an integer number starting from 1...","</br>","</br>";
           }
    }

}//End of Student..



class admin{
    private $conn;

    //Constructor function to establish connection
    function __construct(){
         $this->conn = connect_db();   
     }

     function showAllSessions(){
         // $query="SELECT course_title FROM _course WHERE _course.course_id = _course_session.course_id";
         // $class_titles=$this->conn->query($query);

         $query="SELECT _course_session.course_id , _course_session.session , _course_session.instructor , _course_session.date_time, _course.course_title, _course.course_number FROM _course_session , _course WHERE _course_session.course_id = _course.course_id";
         $result=$this->conn->query($query);
         while ($row=$result->fetch_assoc()){
           // echo $row["course_id"],$row["session"],$row["course_number"],$row["course_title"],"</br>","</br>";
             $id= $row["course_id"];
             $session=$row["session"];
             $class_num = $row["course_number"];
             $class_title = $row["course_title"];
             $instructor=$row["instructor"];
             $date=$row["date_time"];

             $class_title = $class_title . " ". $class_num; 
             
              echo "<tr>";
              echo "<td> $id </td>";
              echo "<td> $session </td>";
              echo "<td> $class_title </td>";
              echo "<td> $instructor</td>";
              echo "<td> $date</td>";
              echo "<td class ='col-md-2'>
                      <button type='submit' value='Delete Class' class='btn btn-warning'>Edit</button>
                      <button type='submit' onclick='deleteSessionModal($id,$session,\"$class_title\",\"$instructor\",\"$date\")' value='Delete Class' class='btn btn-danger'>Delete</button></td>";
              echo "</tr>";
        }
     }

     function add_session($id,$session,$instructor,$date){
        $sql = "INSERT INTO _course_session VALUES($session,$id,'{$instructor}','{$date}')";
        $results = $this->conn->query($sql);

        if ($this->conn->query($sql) === TRUE) {echo "new session created successfully";}
        else{echo "error: " . $sql . "<br>" . $this->conn->error;}

     }


     function update_course($id,$num,$title,$des){
        $sql = "UPDATE _course
                SET course_id = $id, course_number = $num, course_title = '{$title}', description = '{$des}' 
                WHERE course_id = $id";

        $result = $this->conn->query($sql);

        if ($this->conn->query($sql) === TRUE) {
          echo "record edited successfully";
        }
        else
        {
          echo "error: " . $sql . "<br>" . $this->conn->error;
        }
     }

     function delete_course($id){
        $sql = "DELETE FROM _course WHERE course_id = $id";
        $result = $this->conn->query($sql);

        $sql = "DELETE FROM _course_session WHERE course_id = $id";
        $result = $this->conn->query($sql);

        $sql = "DELETE FROM _homework_score WHERE course_id = $id";
        $result = $this->conn->query($sql);

        $sql = "DELETE FROM _enrolled_student WHERE course_id = $id";
        $result = $this->conn->query($sql);

        $sql = "DELETE FROM _course_score WHERE course_id = $id";
        $result = $this->conn->query($sql);

        $sql = "DELETE FROM _course_material WHERE course_id = $id";
        $result = $this->conn->query($sql);

            

        if ($this->conn->query($sql) === TRUE) {
          echo "new record created successfully";
        }
        else
        {
          echo "error: " . $sql . "<br>" . $this->conn->error;
        }
     }

     function add_course($id,$num,$title,$des){
        $sql = "INSERT INTO _course values($id,$num,'{$title}','{$des}')";
        $result = $this->conn->query($sql);


        if ($this->conn->query($sql) === TRUE) {
          echo "new record created successfully";
        }
        else
        {
          echo "error: " . $sql . "<br>" . $this->conn->error;
        }
       //  if ($result){
       //         echo $title," ","saved to course successfully..";
       //      }
       // else{
       //    echo "An error occured, please try again!";
       //  } 
     }

     function showAllCourses(){
         $query="SELECT * FROM _course";
         $result=$this->conn->query($query);
         while ($row=$result->fetch_assoc()){
           // echo $row["course_id"],$row["session"],$row["course_number"],$row["course_title"],"</br>","</br>";
             $id= $row["course_id"];
             $num=$row["course_number"];
             $title=$row["course_title"];
             $desc=$row["description"]; 
             
              echo "<tr>";
              echo "<td> $id </td>";
              echo "<td> $num</td>";
              echo "<td> $title</td>";
              echo "<td> $desc </td>";
              echo "<td class ='col-md-3'>
                      <button  onclick='addSessionModal($id)' value='Delete Class' class='btn btn-success'>+ Session</button>
                      <button type='submit' onclick='editModal($id,$num,\"$title\",\"$desc\")' value='Delete Class' class='btn btn-warning'>Edit</button>
                      <button type='submit' onclick='showModal($id,$num,\"$title\")' value='Delete Class' class='btn btn-danger'>Delete</button></td>";
              echo "</tr>";
          }
      } 

}


class faculty{
}


?>