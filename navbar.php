<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">ระบบบริหารพัสดุจังหวัดพัทลุง</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="project.php"><i class="fas fa-clipboard-list"></i> โครงการ</a>
            </li>
            <li> <a class="nav-link" href="list.php"><i class="fas fa-clipboard-list"></i> ครุภัณฑ์</a></li>
            <li><a class="nav-link" href="manage_group.php"><i class="fab fa-delicious"></i> กลุ่มครุภัณฑ์</a></li>
            <li><a class="nav-link" href="manage_class.php"><i class="fab fa-dropbox"></i> ชนิดครุภัณฑ์</a></li>
            <li><a class="nav-link" href="manage_type.php"><i class="fas fa-chess-board"></i> ประเภทครุภัณฑ์</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">รายงาน<i class="fas fa-print"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="manage_group.php">จัดการกลุ่มครุภัณฑ์ (Group)</a>
                    <a class="dropdown-item" href="manage_class.php">จัดการประเภทครุภัณฑ์ (Class)</a>
                    <a class="dropdown-item" href="manage_type.php">จัดการชนิดครุภัณฑ์ (Type)</a>
                    <a class="dropdown-item" href="project.php">จัดการโครงการ (Project)</a>
                </div>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เอกสาร<i class="fas fa-book"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="paper/manual.pdf" target="_blank">คู่มือกำหนดหมายเลขครุภัณฑ์</a>
                    <a class="dropdown-item" href="manage_class.php">คู่มือการใช้งานระบบ</a>
                </div>
            </li> 
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a  class="btn btn-outline-danger" href="login.php">Logout</a>
        </form>
    </div>
</nav>
ิ