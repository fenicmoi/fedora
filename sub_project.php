<?php   
session_start();
$UserID =  $_SESSION['UserID'];

if($userID=''){
    echo "<script>window.location.href='index.php'</script>";
}

include("header.php");
include("navbar.php");


$pid = $_GET['pid'];
$sql = "SELECT p.*, y.yname FROM project  as p
        INNER JOIN sys_year as y  ON  p.yid = y.yid  
        WHERE p.pid = $pid";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);

?>
<link rel="stylesheet" href="css/styleDelrow.css">
<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="js/hiren.js"></script>     <!-- จัดการลำดับชั้น  -->
<script src="js/del-subproject"></script>   <!--  การลบรายการ  -->
<script src="js/insert-subproject.js"></script>  <!-- การเพิ่มรายการ -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?=$row['name'];?></h4>
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">เจ้าของโครงการ</span>
                            </div>
                            <input type="text"  class="form-control" value="<?=$row['uid'];?>" disabled>
                    </div>

                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-weight-bold" id="basic-addon1">ปีงบประมาณ</span>
                            </div>
                            <input type="text"  class="form-control col-1" value="<?=$row['yname'];?>" disabled>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">งบประมาณ</span>
                            </div>
                            <input type="text"  class="form-control col-1" value="<?=number_format($row['money']);?>" disabled>
                    </div>
                </div>
            </div>
        </div><!-- col-md-12 -->
    </div><!-- row  -->
</div>



<div class="container-fluid">
<div class="row  mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class ="card-header bg-secondary text-white">
                    <span class="font-weight-bold"><i class="fas fa-th"></i>  รายการทรัพย์สินโครงการ</span>
                    <a href="project.php" class="btn btn-primary  float-right">
                        <i class="fas fa-home"></i> กลับหน้าโครงการ
                    </a>
                    <button type="button" class="btn btn-warning  float-right" data-toggle="modal" data-target="#modelId">
                        <i class="fas fa-plus"></i> เพิ่มรายการ
                    </button>
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
                               <th><i class="fas fa-edit"></i></th>
                               <th><i class="fas fa-trash"></i></th>
                           </tr>
                           </thead>
                           <tbody>
                                <?php   
                                    //เลือกรายการที่มีรหัสโครงการเดียวกันและสถานะต้องแสดง
                                    $sql = "SELECT * FROM subproject WHERE pid=$pid AND del = 1 ORDER BY sid ASC";
                                    //echo $sql;
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
                                                <td>".$row['price']."</td>
                                                <td>".$row['howto']."</td>
                                                <td>".thaiDate($row['reciveDate'])."</td>
                                                <td>".$row['lawID']."</td>
                                                <td>".$row['age']."</td>
                                                <td>".$row['reciveOffice']."</td>
                                                <td>".$row['status']."</td>";?>
                                                <td>
                                                    <a  class='btn btn-outline-warning btn-sm btn-block'><i class='fas fa-pencil-alt'></i></a>    
                                                </td>
                                                <td>
                                                    <span class='delete btn btn-danger btn-sm text-white' data-id='<?php echo $row['sid']; ?>'><i class="fas fa-trash"></i></span>
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
</div> <!-- container 2 -->

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-plus"></i> เพิ่มรายการครุภัณฑ์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form name="frmMain" id="frmMain" method="post" >

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">ชื่อรายการ</span>
                        </div>
                        <input type="text" id="listname" name="listname"  class="form-control" required>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">กลุ่มครุภัณฑ์</span>
                        </div>
                        <select class="select2-single"  name="gnumber" id="gnumber" required>
                            <option id="glist">--เลือก--</option>
                        </select> 
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">ประเภทครุภัณฑ์</span>
                        </div>
                        <select class="select2-single"  name="cnumber" id="cnumber" required>
                            <option id="clist" selected>--เลือก--</option>
                        </select> 
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">ชนิดครุภัณฑ์</span>
                        </div>
                        <select class="select2-single"  name="tnumber" id="tnumber" required>
                            <option id="tlist" selected>--เลือก--</option>
                        </select> 
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">รหัสสินทรัพย์</span>
                        </div>
                        <input type="text" id="moneyID" name="moneyID"  class="form-control" value="-">
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">รายละเอียด</span>
                        </div>
                        <input class="form-control" type="text" name="descript" id="descript" value='-' required>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">จำนวน</span>
                        </div>
                        <input type="text" id="amount" name="amount"  class="form-control col-4" required>
                        
                        <div class="input-group-prepend">
                        <label>&nbsp;</label>
                            <span class="input-group-text" id="basic-addon1">ราคา/หน่วย</span>
                        </div>
                        <input type="text" id="price" name="price"  class="form-control col-4" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">บาท</span>
                        </div>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">วิธีการได้มา</span>
                        </div>
                        <select name="howto" id="howto" class="form-control col-3" required>
                            <option value="0">-- เลือก --</option>
                            <option value="ประกาศเชิญชวน">ประกาศเชิญชวน</option>
                            <option value="คัดเลือก">คัดเลือก</option>
                            <option value="เฉพาะเจาะจง">เฉพาะเจาะจง</option>
                            <option value="อื่นๆ" selected>อื่นๆ</option>
                        </select>

                        <div class="input-group-prepend">
                        <label>&nbsp;</label>
                            <span class="input-group-text" id="basic-addon1">วันตรวจรับ</span>
                        </div>
                        <input type="date" id="reciveDate" name="reciveDate"  class="form-control col-3"  required>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">เลขที่สัญญา</span>
                        </div>
                        <input type="text" id="lawID" name="lawID"  class="form-control" value="-" required>

                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">อายุการใช้งาน</span>
                        </div>
                        <input type="text" id="age" name="age"  class="form-control" value="-" required>
                    </div>

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">หน่วยงานที่ใช้</span>
                        </div>
                        <input type="text" id="reciveOffice" name="reciveOffice"  class="form-control" value='-' required>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">สภาพ</span>
                        </div>
                        <select name="status" id="status" class="form-control col-3" required>
                            <option value="ดี" selected>ดี</option>
                            <option value="ชำรุด">ชำรุด</option>
                            <option value="จำหน่าย">จำหน่าย</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="acopy" id="acopy" value="0" checked>
                         ไม่ทำซ้ำ
                      </label>
                    </div>

                    <div class="form-check mb-1">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="acopy" id="acopy" value="1">
                         ทำซ้ำ  <kbd>ใช้กรณีจำนวนหลายชิ้น และแจกจ่ายไปหลายหน่วยงาน</kbd>
                      </label>
                    </div>

                    <div id="rep" class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">จำนวนที่ต้องการทำซ้ำ</span>
                        </div>
                        <input type="number" id="txtRep" name="txtRep"  class="form-control col-2" >
                    </div>

                    <input type="hidden" name="pid" id="pid" value=<?=$pid?>>
                    <input type="hidden" name="aCopy" id="aCopy">
            </div>
            <div class="card-footer">
                <center>
                    <button class="btn btn-success  float-center" type="submit" name="save" id="save">
                        <i class="fa fa-save"></i> บันทึก
                    </button>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
            </form>
        </div>
    </div>
</div>


