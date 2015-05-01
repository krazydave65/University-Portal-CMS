<?php
include("functions.php");
session_start();
if (isset($_SESSION['username'])){
    //clear all session data.
    $_SESSION=array();
}

session_destroy();
redirect_to("index.php");
?>