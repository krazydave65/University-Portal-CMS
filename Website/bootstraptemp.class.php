<?php
class bootstrap{
    public $id = '100';

    private function redirect(){
         echo "<a href='logout.php'>Sign Out</a>";  
    }

    function get_header($para){
         echo "<html>";
         echo "<head>";
         echo "<title>$para</title>";    //page title here.

         //<!-- BOOTSTRAP LINKS -->
         echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>";
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css'>";
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>";
        echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>";
        //  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>";
        // //<!-- Optional theme -->
        // echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css'>";
        // //<!-- Latest compiled and minified JavaScript -->
        // echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>";
        //<!-- END OF BOOTSTRAP -->
        // jquery Link
        // echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>";
        
        echo "<script>
                function showModal(){
                    $('#myModal').modal('show');
                }
                </script>
            ";

        echo "</head>";

        echo"<body>";


        echo "<div class='container'>";
        echo "<div class='jumbotron'>";
        echo "<h1>$para Portal</h1>";       //Header title here.
        $this->redirect();
        echo "</div>";
        echo "</div>";

        echo "<div class='container'>";
    } 


   function get_body_title($para){
        echo "<h2 align='center'>$para</h2>";
   }


   function get_footer(){
        echo "</div>";
        echo "</body>";
        echo "</html>";
    }
  
   function go_back($url){
        echo "<nav>";
        echo "<ul class='pager'>";
        echo "<li class='previous'><a href='$url'><span aria-hidden='true'>&larr;</span> Go Back</a></li>";
        echo "</ul>";
        echo "</nav>";
   }

   function link_button($url,$name){
        echo "<nav>";
        echo "<ul class='pager'>";  
        echo "<li><a href='$url'>$name</a></li>";
        echo "</ul>";
        echo "</nav>";
   }

   function init_jquery(){
    echo "

        <script type='text/javascript'>

            //DELETE COURSE MODAL

            function showModal(id,num,title){
                $('#myModal').modal('show');
                $('#course_id').text(id);
                $('#course_num').text(num);
                $('#course_title').text(title);

                $('#myModal form').attr({
                    'action' : 'controler.php?id=1&delete=' + id
                });
            }
     

            function editModal(id,num,title,desc){

                var desc = desc.replace('\\\','');

                $('#editModal').modal('show');
                $('#editModal #id').attr({
                    'value' : id
                });

                $('#editModal #num').attr({
                    'value' : num
                });

                $('#editModal #title').attr({
                    'value' : title
                });

                $('#editModal #desc').attr({
                    'value' : desc
                });
                $('#editModal form').attr({
                    'action' : 'controler.php?id=1&edit=' + id
                });

            }


            function addSessionModal(id){
              $('#add_session').modal('show');
              $('#add_session form').attr({
                'action' : 'controler.php?id=1&addsession=' + id
              });
            }



            function editSessionModal(id,session,instructor,date){
              $('#edit_session').modal('show');
              $('#edit_session #session').attr({
                    'value' : session
                });

                $('#edit_session #instructor').attr({
                    'value' : instructor
                });

                $('#edit_session #date').attr({
                    'value' : date
                });
                $('#edit_session form').attr({
                    'action' : 'controler.php?id=1&edit=' + id
                });
            }



            function deleteSessionModal(id,session,title,instructor,date){
                $('#deleteSession').modal('show');

                $('#deleteSession #session_num').text(session);
                $('#deleteSession #title').text(title);
                $('#deleteSession #instructor').text(instructor);
                $('#deleteSession #date').text(date); 

                $('#deleteSession form').attr({
                    'action' : 'controler.php?id=1&session_id=' + id + '&session_num=' + session
                });         
              }
            

        </script>
    ";
   }

   function init_Modals(){
    echo "

        <!--======ADD SESSION MODAL =============
        // ====================================
        -->
        <div id='add_session' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h4 class='modal-title'>New Session</h4>
                  </div>
                      <div class='modal-body'>
                        <h4>Add New Session</h4>
                        
                        <form role='form' action='controler.php?id=1' method='post'>

                          <div class='form-group'>
                            <label for='email'>Session:</label>
                            <input id='id' value = '' type='text' name='session' class='form-control'  placeholder='Enter Session Number'>
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Instructor:</label>
                            <input id='num' value = '' type='text' name='instructor' class='form-control' placeholder='Enter Instructors Name' >
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Date and Time:</label>
                            <input id='title' value = '' type='text' name='date' class='form-control' placeholder='Enter Date'>
                          </div>

                          <button type='submit' class='btn btn-success' name='submit_addsession'>Add Session</button>
                        </form>

                      </div>

                      <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        
                      </div>
              </div>
          </div>
      </div>


       <!--======EDIT SESSION MODAL =============
          ====================================-->
        <div id='edit_session' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h4 class='modal-title'>Edit Session</h4>
                      </div>
                      <div class='modal-body'>
                        <h4> Edit this Session</h4>
                        
                        <form role='form' action='controler.php?id=1' method='post'>

                          <div class='form-group'>
                            <label for='email'>Session Number:</label>
                            <input id='session' value = '' type='number' name='session' class='form-control'  placeholder='Enter Session Number'>
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Instructor:</label>
                            <input id='instructor' value = '' type='text' name='instructor' class='form-control' placeholder='Enter Instructors Name' >
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Date:</label>
                            <input id='date' value = '' type='text' name='date' class='form-control' placeholder='Enter Date'>
                          </div>

                          <button type='submit' class='btn btn-warning' name='submit_edit_session'>Submit Changes</button>
                        </form>

                      </div>

                      <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        
                      </div>
              </div>
          </div>
      </div>

 

        <!--======DELETE SESSION MODAL =============
            ====================================-->
        <div id='deleteSession' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h4 class='modal-title'>Delete Session</h4>
                      </div>
                      <div class='modal-body'>
                        <h4> Are you sure you want to delete this session?</h4>
                        
                        <table class='table table-striped table-bordered table-hover table-condensed'>
                            <thead>
                                <th>Session Number</th>
                                <th>Title</th>
                                <th>Instructor</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id ='session_num'></td>
                                    <td id ='title'></td>
                                    <td id ='instructor'></td>
                                    <td id ='date'></td>
                                </tr>
                            </tbody>
                        </table>

                      </div>

                      <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        <form role='form' action='controler.php?id=1' method='post'>
                          <button type='submit' name='deleted_session' class='btn btn-danger'>Delete Session</button>
                        </form>
                      </div>
              </div>
          </div>
      </div>

  


        <!--======DELETE COURSE MODAL =============
          ====================================-->

        <div id='myModal' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h4 class='modal-title'>Delete Course</h4>
                      </div>
                      <div class='modal-body'>
                        <h4> Are you sure you want to delete this course?</h4>
                        
                        <table class='table table-striped table-bordered table-hover table-condensed'>
                            <thead>
                                <th>ID</th>
                                <th>Number</th>
                                <th>Title</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id ='course_id'></td>
                                    <td id ='course_num'></td>
                                    <td id ='course_title'></td>
                                </tr>
                            </tbody>
                        </table>

                      </div>

                      <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        <form role='form' action='controler.php?id=1' method='post'>
                          <button type='submit' name='deleted' class='btn btn-danger'>Delete Course</button>
                        </form>
                      </div>
              </div>
          </div>
      </div>




        <!--======EDIT COURSE MODAL =============
          ====================================-->
        <div id='editModal' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                      <h4 class='modal-title'>Delete Course</h4>
                      </div>
                      <div class='modal-body'>
                        <h4> Are you sure you want to delete this course?</h4>
                        
                        <form role='form' action='controler.php?id=1' method='post'>

                          <div class='form-group'>
                            <label for='email'>ID:</label>
                            <input id='id' value = '' type='text' name='id' class='form-control'  placeholder='Enter ID'>
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Number:</label>
                            <input id='num' value = '' type='number' name='num' class='form-control' placeholder='Enter Number' >
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Title:</label>
                            <input id='title' value = '' type='text' name='title' class='form-control' placeholder='Enter Title'>
                          </div>

                          <div class='form-group'>
                            <label for='pwd'>Description:</label>
                            <input id='desc' value = '' type='text' name='desc' class='form-control' placeholder='Enter Description'>
                          </div>              

                          <button type='submit' class='btn btn-warning' name='submit_edit'>Submit Changes</button>
                        </form>

                      </div>

                      <div class='modal-footer'>
                      <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        
                      </div>
              </div>
          </div>
      </div>

  ";
   }

   function init_form(){

    echo "
          <form role='form' action='controler.php?id=1' method='post'>

            <div class='form-group'>
              <label for='email'>ID:</label>
              <input type='text' name='class_id' class='form-control'  placeholder='Enter ID'>
            </div>

            <div class='form-group'>
              <label for='pwd'>Number:</label>
              <input type='number' name='num' class='form-control' placeholder='Enter Number' >
            </div>

            <div class='form-group'>
              <label for='pwd'>Title:</label>
              <input type='text' name='title' class='form-control' placeholder='Enter Title'>
            </div>

            <div class='form-group'>
              <label for='pwd'>Description:</label>
              <input type='text' name='description' class='form-control' placeholder='Enter Description'>
            </div>                      

            <button type='submit' class='btn btn-default' name='add_class_submit'>Submit</button>
          </form>


        ";
   }



}//End of class

?>