<?php
// στισ σελιδεσ που εχουν επικινωνια με πινακεσ συνδεουμε αυτο για ευκολεσ αλλαγεσ
  $con = mysqli_connect('localhost','root','','resit_db');
  if (!$con)
  {
    die(mysqli_error($con));
  }
  
?>