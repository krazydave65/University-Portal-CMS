<?php
include ("functions.php");

//This class takes user&pass, checks them in the DB, and then return the (role) back
class login{
      private $connection;
      private $user;
      private $pass;
      //Class constructor takes user & pass and establish connection.
      function __construct($para1,$para2){
          $this->connection=connect_db();
          $this->user=$para1;
          $this->pass=$para2;
      }
      function get_role(){
          $query="SELECT role FROM _authentication WHERE username=? AND password=?";
          
          $stmt=$this->connection->prepare($query);   //Prepared statment start
          $stmt->bind_param("ss",$this->user,$this->pass);
          $stmt->execute();    
          $stmt->bind_result($role); 
         //Fetching rows.     
          while($stmt->fetch()){
               return $role;
          }
      } 
}//end login



//main method: (This is the body of this file, all the loging logic is done here.)

//Gathering input from prev. page:
$username=$_POST['username'];
$password=$_POST['password'];

//User authentication: 
$login= new login($username,$password);
$role=$login->get_role();

if ($role =="admin"){//Admin Session.
   session_start();
   $_SESSION['username']=$username;
   $_SESSION['role']=$role;

   redirect_to("administrator.php?id=2");
}

elseif ($role=="student"){ //Student Session.
   session_start(); 
   $_SESSION['username']=$username;
   $_SESSION['role']=$role;
   redirect_to("student.php");
}

elseif ($role=="faculty"){  //Faculty Session. 
   session_start();
   $_SESSION['username']=$username;
   $_SESSION['role']=$role;
   redirect_to("faculty.php");
}

else{
  echo "Error, Wrong username or password!","</br>";
  echo "<a href='index.php'> <-Go Back</a>";
}

?>
