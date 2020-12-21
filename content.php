

<div class="container-fluid">
<?php 
//count  project province
$sql = "SELECT pid FROM project WHERE owner = 'งบจังหวัด'";
$result = dbQuery($sql);
$sumProvince = dbNumRows($result);

$sql = "SELECT pid FROM project WHERE owner = 'งบกลุ่มจังหวัด'";
$result = dbQuery($sql);
$sumGroup = dbNumRows($result);

?>

<section class='bg-light min-wh-100 mt-2'>
   <div class="container-fluse">
       <div class="row">
           <div class="col-sm-3 col-md-2">
                <div class="list-group">
                        <a href="?menu=home" class="list-group-item list-group-item-action active">
                            <i class="fas fa-home"></i> หน้าหลัก 
                        </a>
                        <a href="?menu=userProvince" class="list-group-item list-group-item-action"><i class="fas fa-angle-right"></i> โครงการจังหวัด</a>
                        <a href="?menu=userGroup" class="list-group-item list-group-item-action"><i class="fas fa-angle-right"></i> โครงการกลุ่มจังหวัด</a>
                        <a href="?menu=userList" class="list-group-item list-group-item-action"><i class="fas fa-angle-right"></i> รายการครุภัณฑ์</a>
                        <a href="paper/manual.pdf" class="list-group-item list-group-item-action" target="_blink"><i class="fas fa-book"></i> คู่มือการใช้ระบบ</a>
                        <a href="paper/manual.pdf" class="list-group-item list-group-item-action" target="_blink"><i class="fas fa-book"></i> คู่มือหมายเลขครุภัณฑ์</a>
                </div>
            </div>
           <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">deskboard</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="img/blogger.png" class="w-100 rounded-circle">
                                    </div>
                                    <div class="col-sm mt-50">
                                        <h3>ระบบฐานข้อมูลทะเบียนทรัพย์สิน<?php echo province;?></h3>
                                        <p>โครงการจังหวัด/โครงการกลุ่มจังหวัด</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm bg-success text-white">
                                        <div class="text-center p-4">
                                            <h2><?php echo $sumProvince;?></h2>
                                            <p>โครงการจังหวัด</p>
                                        </div>
                                    </div>
                                    <div class="col-sm bg-warning text-white">
                                       <div class="text-center p-4">
                                            <h2><?php echo $sumGroup;?></h2>
                                            <p>กลุ่มจังหวัด</p>
                                        </div>
                                    </div>
                                    <div class="col-sm bg-info text-white">
                                        <div class="text-center p-4">
                                            <h2><?php echo $sumProvince + $sumGroup;?></h2>
                                            <p>โครงการทั้งหมด</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3>กราฟแสดงผล</h3>
                                <h5 class="mt-3">graph1</h5>
                                <div class="progress">
                                    <div class="progress-bar w-75 bg-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h5 class="mt-3">graph2</h5>
                                <div class="progress">
                                    <div class="progress-bar w-50 bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h5 class="mt-3">graph3</h5>
                                <div class="progress">
                                    <div class="progress-bar w-100 bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h5 class="mt-3">graph4</h5>
                                <div class="progress">
                                    <div class="progress-bar w-25 bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
   </div>

</section>

</div>