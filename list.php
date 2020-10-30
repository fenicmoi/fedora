<?php   
session_start();
$UserID =  $_SESSION['UserID'];

if($userID=''){
    echo "<script>window.location.href='index.php'</script>";
}

include("header.php");
include("navbar.php");

?>
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<div class="container-fluid">
<div class="row  mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class ="card-header bg-secondary text-white">
                    <span class="font-weight-bold"><i class="fas fa-th"></i>  รายการทรัพย์สินจังหวัด</span>
                    <a href="project.php" class="btn btn-primary  float-right">
                        <i class="fas fa-home"></i> กลับหน้าโครงการ
                    </a>
                </div>
                
                <div class="card-body">
                   <table class="table table-striped table-bordered" id="myTable">
                       <thead class="thead-inverse">
                           <tr>
                               <th><h6>ที่</h6></th>
                               <th><h6>รหัสครุภัณฑ์</h6></th>
                               <th><h6>รายการ</h6></th>
                               <th><h6>รหัสสินทรัพย์</h6></th>
                               <th><h6>รายละเอียด</h6></th>
                               <th><h6>จำนวน</h6></th>
                               <th><h6>ราคา/หน่วย</h6></th>
                               <th><h6>วิธีการได้มา</h6></th>
                               <th><h6>วันตรวจรับ</h6></th>
                               <th><h6>เลขที่สัญญา</h6></th>
                               <th><h6>อายุการใช้งาน</h6></th>
                               <th><h6>หน่วยงานใช้ทรัพย์สิน</h6></th>
                               <th><h6>สถานะ</h6></th>
                               <th><h6><i class="fas fa-cog"></i></h6></th>
                           </tr>
                           </thead>
                           <tbody>
                                <?php   
                                    $sql = "SELECT * FROM subproject  ORDER BY sid ASC";
                                    $result = dbQuery($sql);
                                    $count = 1;
                                    while ($row = dbFetchArray($result)) {
                                      echo "<tr>
                                                <td>".$count."</td>
                                                <td>".$row['fedID']."</td>
                                                <td>".$row['listname']."</td>
                                                <td>".$row['moneyID']."</td>
                                                <td>".$row['descript']."</td>
                                                <td>".$row['amount']."</td>
                                                <td>".number_format($row['price'])."</td>
                                                <td>".$row['howto']."</td>
                                                <td>".$row['reciveDate']."</td>
                                                <td>".$row['lawID']."</td>
                                                <td>".$row['age']."</td>
                                                <td>".$row['reciveOffice']."</td>
                                                <td>".$row['status']."</td>"; ?>
                                                <td>
                                                    <a class='btn btn-outline-warning btn-sm'
                                                       onclick = "load_edit('<?=$row['sid']?>')" 
                                                       data-toggle ='modal'
                                                       data-target='#modelEdit'>
                                                       <i class='fas fa-edit'></i>
                                                    </a>
                                                </td>
                                            </tr>
                                <?php             
                                        $count++;
                                    }
                                ?>
                           </tbody>
                   </table>
                </div>
            </div>
        </div><!-- col-md-12 -->

    </div><!-- row  -->

        <!-- Modal Display Edit -->
        <div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title"><i class="fas fa-pen"></i> แก้ไขรายละเอียดรายการ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                         <div id="divDataview"> </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>                                  

</div> <!-- container 2 -->




<?php include("footer.php");?>
<?php 
 if(isset($_POST['save'])){

    $sid = $_POST['sid'];
     $listname = $_POST['listname'];
     $moneyID = $_POST['moneyID'];
     $descript = $_POST['descript'];
     $amount = $_POST['amount'];
     $price = $_POST['price'];
     $howto = $_POST['howto'];
     $reciveDate = $_POST['reciveDate'];
     $lawID = $_POST['lawID'];
     $age = $_POST['age'];
     $reciveOffice = $_POST['reciveOffice'];
     $status  = $_POST['status'];

     $sql = "UPDATE subproject SET  
             listname = '$listname',
             moneyID = '$moneyID',
             descript = '$descript',
             amount = '$amount',
             price = $price,
             howto = '$howto',
             reciveDate = '$reciveDate',
             lawID = '$lawID',
             age = '$age',
             reciveOffice = '$reciveOffice',
             status = '$status'
             WHERE  sid = $sid
            ";

    $result  = dbQuery($sql);

    if($result){
        echo "<script>alert('แก้ไขข้อมูลแล้ว')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='list.php'>";
    }else{
        echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='list.php'>";
    }

    
 }

?>

<script>
    function load_edit(sid){
     console.log(sid);
	 var sdata = {
         sid : sid,
     };
	$("#divDataview").load("edit-supproject.php",sdata);
}
</script>



   
