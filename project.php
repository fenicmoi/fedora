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
<script>


    //check Classซ้ำ
$(document).ready(function(){

    // $("#tnumber").keyup(function(){
    //     var tnumber = $(this).val().trim();

    //     if(gnumber != ''){
    //         $.ajax({
    //             url: 'chkType.php',
    //             type: 'post',
    //             data: {tnumber: tnumber},
    //             success: function(responseName){
    //                 $('#lblWarning').html(responseName);
    //             }
    //         });
    //     }else{
    //         $("#lblWarning").html("");
    //     }
    // });


    // $("#tname").keyup(function(){
    //     var tname = $(this).val().trim();

    //     if(tname != ''){
    //         $.ajax({
    //             url: 'chkType.php',
    //             type: 'post',
    //             data: {tname: tname},
    //             success: function(responseName){
    //                 $('#lblWarning2').html(responseName);
    //             }
    //         });
    //     }else{
    //         $("#lblWarning2").html("");
    //     }
    // });



    
});
  
</script>

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
                            <th>ID</th>
                            <th>ชื่อโครงการ/กิจกรรมddd</th>
                            <th>งบประมาณ</th>
                            <th>ปีงบประมาณ</th>
                            <th>หน่วยรับผิดชอบ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </thead>
                        <tbody>
                        <?php   
                            $sql ="SELECT  p.*, y.yname FROM project  p
                                   INNER JOIN  sys_year  y   ON (p.yid = y.yid)
                                   INNER JOIN  user u ON (p.uid = u.id)
                                   ORDER BY  pid DESC";
                            $result = dbQuery($sql);
                            while ($row = dbFetchArray($result)) {?>
                                <tr>
                                         <td><?php echo $row['pid'];?></td>
                                         <td><?php echo $row['name'];?></td>
                                         <td>
                                            <?php 
                                                if($row['money']==0){
                                                    echo "ไม่ระบุ";
                                                }else{
                                                  echo $row['money'];   
                                                }
                                                
                                            ?>
                                        </td>
                                         <td><?php echo $row['yname'];?></td>
                                         <td><?php echo $row['uid'];?></td>
                                         <td>
                                            <a class="btn btn-outline-warning btn-sm" 
                                                onclick = "load_edit('<?=$row['pid']?>')" 
                                                data-toggle="modal" 
                                                data-target="#modelEdit">
                                                <i class="fas fa-pencil-alt"></i> 
                                            </a> 
                                         </td>
                                         <td><a class="btn btn-outline-danger btn-sm" ><i class="fas fa-trash-alt"></i></a></td>
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
        $sql_y = "SELECT * FROM sys_year  ORDER BY yid DESC";
        $result_y = dbQuery($sql_y);
    ?>        

     <!-- Modal Insert -->
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title"><i class="fas fa-pen"></i> แก้ไข </h5>
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
        $uid = $_SESSION['UserID'];
        



        $sql = "INSERT INTO project(recid, name, money, yid, uid) VALUES($num, '$name', $money, $yid, $yid)";

        $result =  dbQuery($sql);
        if($result){
            echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='project.php'>";
        }
    }

    if(isset($_POST["editSave"])){
        $tid = $_POST['tid'];
        $tstatus = $_POST['tstatus'];
        $gid = $_POST['editGroup'];
        $cid = $_POST['editClass'];
        $tnumber = $_POST['tnumber'];
        $tname = $_POST['tname'];

        $sql ="UPDATE st_typetype SET  tnumber = '$tnumber', tname = '$tname', tstatus = $tstatus, cid = $cid, gid = $gid WHERE tid = $tid";
        $result = dbQuery($sql);
       // echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='manage_class.php'>";
        
        if($result){
            echo "<META HTTP-EQUIV='Refresh' Content='0'; URL='manage_type.php'>";
        }
    }
?>


<script>

function load_edit(tid){
	 var sdata = {
         tid : tid,
     };
	$("#divDataview").load("type_edit.php",sdata);
}

</script>

<script>
			
			$(function(){
				
				//เรียกใช้งาน Select2
				$(".select2-single").select2({ width: "500px", dropdownCssClass: "bigdrop"});
				
				//ดึงข้อมูล province จากไฟล์ get_data.php
				$.ajax({
					url:"get_data.php",
					dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
					data:{show_province:'show_province'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
					success:function(data){
						
						//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
						$.each(data, function( index, value ) {
							//แทรก Elements ใน id province  ด้วยคำสั่ง append
							  $("#gnumber").append("<option value='"+ value.gid +"'> " +value.gnumber + value.gname + "</option>");
						});
					}
				});
				
				
				//แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
				$("#gnumber").change(function(){

					//กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
					var province_id = $(this).val();
					
					$.ajax({
						url:"get_data.php",
						dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
						data:{province_id:province_id},//ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
						success:function(data){
							
							//กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
							$("#cnumber").text("");
							
							//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
							$.each(data, function( index, value ) {
								
								//แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
								  $("#cnumber").append("<option value='"+ value.cid +"'> " + value.cnumber+"."+value.cname + "</option>");
							});
						}
					});

				});
				
				//แสดงข้อมูลตำบล โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #amphur
				$("#amphur").change(function(){
					
					//กำหนดให้ ตัวแปร amphur_id มีค่าเท่ากับ ค่าของ  #amphur ที่กำลังถูกเลือกในขณะนั้น
					var amphur_id = $(this).val();
					
					$.ajax({
						url:"get_data.php",
						dataType: "json",//กำหนดให้มีรูปแบบเป็น Json
						data:{amphur_id:amphur_id},//ส่งค่าตัวแปร amphur_id เพื่อดึงข้อมูล ตำบล ที่มี amphur_id เท่ากับค่าที่ส่งไป
						success:function(data){
							
							  //กำหนดให้ข้อมูลใน #district เป็นค่าว่าง
							  $("#district").text("");
							  
							//วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
							$.each(data, function( index, value ) {
								
							  //แทรก Elements ข้อมูลที่ได้  ใน id district  ด้วยคำสั่ง append
							  $("#district").append("<option value='" + value.id + "'> " + value.name + "</option>");
							  
							});
						}
					});
					
				});
				
				//คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
				$("#district").change(function(){
					
					//นำข้อมูลรายการ จังหวัด ที่เลือก มาใส่ไว้ในตัวแปร province
					var province = $("#province option:selected").text();
					
					//นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
					var amphur = $("#amphur option:selected").text();
					
					//นำข้อมูลรายการ ตำบล ที่เลือก มาใส่ไว้ในตัวแปร district
					var district = $("#district option:selected").text();
					
					//ใช้คำสั่ง alert แสดงข้อมูลที่ได้
					alert("คุณได้เลือก :  จังหวัด : " + province + " อำเภอ : "+ amphur + "  ตำบล : " + district );
					
				});
				
				
			});
			
	</script>

<?php  include("footer.php");  ?>    