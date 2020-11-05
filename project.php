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

        
        <div class="card ">
            <div class="card-header">
                <span class="font-weight-bold"><i class="fas fa-th"></i> รายชื่อโครงการรวม</span>
                <button type="button" class="btn btn-warning  float-right" data-toggle="modal" data-target="#modelId">
                    <i class="fas fa-plus"></i> เพิ่มโครงการ
                </button>
    
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="myTable">
                        <thead class="bg-secondary text-white">
                            <th>ID ระบบ</th>
                            <th>ชื่อโครงการ/กิจกรรม</th>
                            <th>งบประมาณ</th>
                            <th>ปีงบประมาณ</th>
                            <th>หน่วยรับผิดชอบ</th>
                            <th>รายการครุภัณฑ์</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </thead>
                        <tbody>
                        <?php   
                            $sql ="SELECT  p.*, y.yname FROM project  p
                                   INNER JOIN  sys_year  y   ON (p.yid = y.yid) 
                                   ORDER BY  pid DESC";
                            $result = dbQuery($sql);
                            while ($row = dbFetchArray($result)) {?>
                                <tr>
                                         <td><?php echo $row['pid'];?></td>
                                         <td><a href="sub_project.php?pid=<?=$row['pid']?>" class="text-secondary"><?php echo $row['name'];?></a></td>
                                         <td>
                                            <?php 
                                                if($row['money']==0){
                                                    echo "ไม่ระบุ";
                                                }else{
                                                  echo  number_format($row['money']);   
                                                }
                                                
                                            ?>
                                        </td>
                                         <td><?php echo $row['yname'];?></td>
                                         <td><?php echo $row['uid'];?></td>
                                         <td><a href="sub_project.php?pid=<?=$row['pid']?>" class="btn btn-outline-primary btn-block btn-sm"><i class="fas fa-eye"></i> </a></td>
                                         <td>
                                            <a class="btn btn-outline-warning btn-sm btn-block" 
                                                onclick = "load_edit('<?=$row['pid']?>')" 
                                                data-toggle="modal" 
                                                data-target="#modelEdit">
                                                <i class="fas fa-pencil-alt"></i> 
                                            </a> 
                                         </td>
                                         <td><a href="?pid=<?=$row['pid'];?>" class="btn btn-outline-danger btn-sm btn-block" ><i class="fas fa-trash-alt"></i></a></td>
                                     </tr>
                           <?php } ?>
                        </tbody>
                   </table>

            </div>
            <div class="card-footer text-muted">
              
            </div>
        </div> <!-- card -->
    <?php   
        //ปีงบประมาณ
        $sql_y = "SELECT * FROM sys_year  ORDER BY yname DESC";
        $result_y = dbQuery($sql_y);

    ?>        

     <!-- เพิ่มโครงการ -->
     <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document" style="min-width: 800px">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white"> <i class="fas fa-plus"></i> เพิ่มโครงการ
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
            <form method="post">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ปีงบประมาณ</span>
                        </div>
                        <select class="form-control col-4" name="sel_year" id="sel_year">
                        <?php    
                            while($row_y = dbFetchArray($result_y)){?>
                                <option  id='ylist' value='<?=$row_y['yid'];?>''><?=$row_y['yname']?></option>
                        <?php }?>
                        </select>

                        <div class="input-group-prepend">
                            <span class="input-group-text">วันที่บันทึก</span>
                        </div>
                        <input type="text" name="txtDate" id="txtDate" class="form-control" value="<?php echo DateThai();?>" disabled>
                    </div>  

                    <div class="form-group">            
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ชื่อโครงการ</span>
                            </div>
                            <input type="text" name="prj_name" id="prj_name" class="form-control"  required="required" title="เพิ่มชื่อโครงการ">
                        </div>
                    </div>

                    <div class="form-group">            
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">งบประมาณ</span>
                            </div>
                            <input type="number" name="money" id="money" class="form-control" value=0 title="เพิ่มชื่อโครงการ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">บาท</span>
                            </div>
                        </div>
                    </div>

                    <?php   
                        //หน่วยรับผิดชอบ
                        $sql_user = "SELECT * FROM user ORDER BY id ASC";
                        $result_user  = dbQuery($sql_user);

                    ?>
                    
                    <div class="form-group">            
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">หน่วยรับผิดชอบ</span>
                            </div>
                            <input type="text" name="sel_office" id="sel_office" class="form-control" value="-" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เจ้าหน้าที่</span>
                            </div>
                            <input type="text" name="txtUser" id="txtUser" class="form-control" value="<?php echo $_SESSION['User']?>" disabled>
                        </div>
                    </div>
                    <div id="lblWarning"></div>
                    <div id="lblWarning2"></div>  
                    </div>
                    <div class="card-footer">
                            <center>
                            <button class="btn btn-success  float-center" type="submit" name="save" id="save">
                                <i class="fa fa-save"></i> บันทึก
                            </button>
                            </center>
                    </div>
                </form>
            </div> <!-- main body -->
        </div> <!-- modal content -->
            </div>
        </div>

        <!-- Modal Display Edit -->
        <div class="modal fade" id="modelEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title"><i class="fas fa-pen"></i> แก้ไขโครงการ </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                         <div id="divDataview"></div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
</div> <!-- container -->

<?php  


    if(isset($_POST['save'])){
        $yid = $_POST['sel_year'];
        
        $sql =  "SELECT recid FROM project WHERE yid=$yid";
        $result = dbQuery($sql);
        $num = dbNumRows($result);
        $num++;
        $name = $_POST['prj_name'];
        $money = $_POST['money'];
        $uid = $_POST['sel_office'];
        

        $sql = "INSERT INTO project(recid, name, money, yid, uid) VALUES($num, '$name', $money, $yid, '$uid')";

        $result =  dbQuery($sql);
        if($result){
            echo "<script>alert('บันทึกโครงการเรียบร้อยแล้ว')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='project.php'>";
        }else{
            echo "<script>alert('มีบางอย่างผิดพลาด  กรุณาติดต่อ Admin')</script>";
        }
    }

    if(isset($_POST["btnEdit"])){
        $pid = $_POST['pid'];
        $uid = $_POST['sel_office'];
        $sel_year = $_POST['sel_year'];
        $prj_name = $_POST['prj_name'];
        $money = $_POST['money'];

        $sql ="UPDATE project  SET   name = '$prj_name', money = $money, yid = $sel_year, uid='$uid'  WHERE pid = $pid";
        $result = dbQuery($sql);
        if($result){
            echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='project.php'>";
        }else{
            echo "<script>alert('มีบางอย่างผิดพลาด')</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='project.php'>";
        }
    }
?>


<script>

function load_edit(pid){
	 var sdata = {
         pid : pid,
     };
	$("#divDataview").load("edit-project.php",sdata);
}

</script>
<?php  include("footer.php");  ?>    