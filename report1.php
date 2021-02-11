<?php   
  include("library/database.php");
  include("library/config.php");
  include("library/function.php");
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// เพิ่ม Font ให้กับ mPDF
$mpdf = new \Mpdf\Mpdf;

ob_start(); // Start get HTML code


$pid = $_GET['pid'];
$sql = "SELECT p.*, y.yname FROM project  as p
        INNER JOIN sys_year as y  ON  p.yid = y.yid  
        WHERE p.pid = $pid";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);

?>
<!DOCTYPE html>
<html>
<head>
<title>PDF</title>

<style>
body {
    font-family: "Garuda";
}
</style>
</head>
<body>

<table width="100%" border=1>
        <tr>
            <td colspan=2><center><a href="MyPDF.pdf"><h1>พิมพ์</h1></a></center></td>
        </tr>
        <tr>
            <td>ชื่อโครงการ</td>
            <td><?php echo $row['name'];?></td>
        </tr>
        <tr>
            <td>งบประมาณ</td>
            <td><?php  echo number_format($row['money']);?></td>
        </tr>
        <tr>
            <td>เจ้าของโครงการ</td>
            <td><?php  echo $row['uid'];?></td>
        </tr>
        <tr>
            <td>ปีงบประมาณ</td>
            <td><?php  echo $row['yname'];?></td>
        </tr>
</table>


                   <table width="100%" border="1">
                       <thead class="thead-inverse">
                           <tr>
                               <th><h6>ที่</h6></th>
                               <th><h6>รหัสครุภัณฑ์</h6></th>
                               <th><h6>รายการ</h6></th>
                               <th><h6>รหัสสินทรัพย์</h6></th>
                               <th><h6>จำนวน</h6></th>
                               <th><h6>ราคา</h6></th>
                               <th><h6>อายุการใช้งาน</h6></th>
                               <th><h6>หน่วยใช้งาน</h6></th>
                           </tr>
                           </thead>
                           <tbody>
                                <?php   
                                    //เลือกรายการที่มีรหัสโครงการเดียวกันและสถานะต้องแสดง
                                    $sql = "SELECT * FROM subproject WHERE pid=$pid AND del = 1 ORDER BY sid ASC";
                                   // echo $sql;
                                    $result = dbQuery($sql);
                                    $count = 1;
                                    while ($row = dbFetchArray($result)) {
                                      echo "<tr>
                                                <td>".$count."</td>
                                                <td>".$row['fedID']."</td>
                                                <td>".$row['listname']."</td>
                                                <td>".$row['moneyID']."</td>
                                                <td>".$row['amount']."</td>
                                                <td>".number_format($row['price'])."</td>
                                                <td>".$row['lawID']."</td>
                                                <td>".$row['reciveOffice']."</td>";?>
                                               
                                            </tr>
                                    <?php         
                                        $count++;
                                    }
                                ?>
                           </tbody>
                   </table>


<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("MyPDF.pdf");
ob_end_flush()
?>

ดาวโหลดรายงานในรูปแบบ PDF <a href="MyPDF.pdf">คลิกที่นี้</a>
</body>
</html>