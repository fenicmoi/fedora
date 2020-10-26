<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>jQuery TreeTable Demo Page</title>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- Bootstrap -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>

body { background-color:#fafafa; font-family:'Open Sans';}
.container { margin:150px auto;}
    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
        cursor: pointer;
    }
    
</style>
</head>
<body>
<?php 

include("library/database.php");
$sql = "SELECT * FROM st_group ORDER BY gid";
$result = dbQuery($sql);

?>
<div class="container">
<h1 class="text-center">jQuery TreeTable Demo Page</h1>
  <table id="tree-table" class="table table-hover table-bordered">
    <thead>
        <th>#</th>
        <th>Test</th>
    </thead>
    <tbody>
        <?php  
            while ($row1 = dbFetchArray($result)) {
                echo "
                     <tr data-id='$row1[gid]' data-parent='0' data-level='1'>
                         <td data-column='name'>$row1[gnumber]</td>
                         <td>$row1[gname]</td>
                     </tr>
                     ";
                $sql2 = "SELECT * FROM st_class WHERE gid = $row1[gid]";
                $result2 = dbQuery($sql2);
                while ($row2 = dbFetchArray($result2)) {
                    echo "
                    <tr data-id='$row2[cid] data-parent='1' data-level='2'>
                        <td data-column='name'>$row2[cnumber]</td>
                        <td>$row2[cname]</td>
                    </tr>
                    ";
                }
            }
        ?>
      </tbody>
    
  </table>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="js/javascript.js"></script>
</body>
</html>