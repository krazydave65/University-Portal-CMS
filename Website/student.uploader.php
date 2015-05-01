<?php
include ("classes.class.php");
include ("bootstraptemp.class.php");
$page= new bootstrap();

$page->get_header("Student");
$page->get_body_title("-Student Uploader-");

                            echo "<meta http-equiv='content-type' content='text/html' charset=UTF-8'>";
                            echo "<form action='controler.php?id=4' method='POST' enctype='multipart/form-data'>";
                            echo "<input type='file' name='uploaded_file'>";
                            echo "<input type='submit' value='Upload file'>";
                            echo "</form>";

$page->go_back("student.php");
$page->get_footer();

?>