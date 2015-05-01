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
            function showModal(id,num,title){
                $('#myModal').modal('show');
                $('#course_id').text(id);
                $('#course_num').text(num);
                $('#course_title').text(title);

                $('#myModal form').attr({
                    'action' : 'controler.php?id=1&delete=' + id
                });
            }
        ";


    echo "

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

        </script>
    ";
   }

   function init_modal(){
    echo "
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

  ";
   }


   public function init_editModal(){

    echo "
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