<?php   
session_start();
$UserID =  $_SESSION['UserID'];
$breadcom = "deskboard";

if($userID=''){
    echo "<script>window.location.href='index.php'</script>";
}

include ("header.php");
include("navbar.php");
?>

<section class='bg-light min-wh-100'>
   <div class="container-fluse">
       <div class="row">
           <div class="col-sm-3 col-md-2">
                <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                            home
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">about</a>
                        <a href="#" class="list-group-item list-group-item-action">contact</a>
                </div>
            </div>
           <div class="col">
                <div class="alert alert-primary" role="alert">
                    This is a primary alert—check it out!
                </div>
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
                                        <img src="img/avataaars.png" class="w-100 rounded-circle">
                                    </div>
                                    <div class="col-sm">
                                        <h3>ระบบฐานข้อมูลทะเบียนทรัพย์สินจังหวัดพัทลุง</h3>
                                        <p>โครงการจังหวัด/โครงการกลุ่มจังหวัด</p>
                                        <p>พัฒนาโดย สำนักงานจังหวัดพัทลุง</p>
                                        <p>Developer by  Mr.Somsak Kreawkring</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm bg-success text-white">
                                        <div class="text-center p-4">
                                            <h2>37</h2>
                                            <p>โครงการจังหวัด</p>
                                        </div>
                                    </div>
                                    <div class="col-sm bg-warning text-white">
                                       <div class="text-center p-4">
                                            <h2>400</h2>
                                            <p>กลุ่มจังหวัด</p>
                                        </div>
                                    </div>
                                    <div class="col-sm bg-danger text-white">
                                       <div class="text-center p-4">
                                            <h2>789</h2>
                                            <p>โครงการทั้งหมด</p>
                                        </div>
                                    </div>
                                    <div class="col-sm bg-info text-white">
                                        <div class="text-center p-4">
                                            <h2>49</h2>
                                            <p>โครงการรวม</p>
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
                <div class="row mt-3">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                 <img src="https://picsum.photos/id/237/400/300" class="w-100">
                                            </div>
                                            <div class="col-sm">
                                                <h3>Lorem, ipsum dolor.</h3>
                                                <p>Lorem ipsum dolor sit amet consectetur.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="https://picsum.photos/id/1003/400/300" class="w-100">
                                                </div>
                                                <div class="col-sm">
                                                    <h3>Lorem, ipsum dolor.</h3>
                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Item Manager
                            </div>
                            <div class="card-body">hi </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
   </div>

</section>
