<?php  
  //session_start();
  include("library/database.php");
  include("library/config.php");
  include("library/function.php");
  ?>
<!doctype html>
<html lang="en">
  <head>
    <title><?=$title;?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stlesheet"  href="css/style.css">
    <link rel="stylesheet" href="css/datatable.css">
   <!-- sweetalert 2 -->  
    <script src="js/sweetalert2.js"></script>
    <!-- font Awasome 4.7 -->  
    <script src="https://kit.fontawesome.com/d1483361bb.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/datatable.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "order": [[ 0, "desc" ]]
            }); 
            
         }        
         );
    </script>
  </head>

  <body>
    


