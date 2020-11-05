<?php 
include "library/database.php";
//hellojava
$id = 0;

if(isset($_POST['id'])){
  // $id = mysqli_real_escape_string($con,$_POST['id']);
   $id = $_POST['id'];

   $sql = "SELECT sid FROM subproject WHERE sid = $id ";
   $result = dbQuery($sql);
   $numrow = dbNumRows($result);

   if($numrow > 0){
     //$sql = "DELETE FROM subproject WHERE sid = $id";
     $sql = "UPDATE subproject SET del = 0  WHERE sid=$id";
     dbQuery($sql);

     echo 1;  
     exit;
   }
    echo 0;
    exit;
}else{
  echo 0;
  exit;
}

