<?php
$post = new mysqli("localhost", "root", "", "post");
if($post->connect_error) {
  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$post->set_charset("utf8");
//mysqli_set_charset($post,"utf8");


?>