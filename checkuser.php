<?php 
session_start();
        // if(isset($_POST['Username'])){
                  include("header.php");
                  // $Username = mysqli_real_escape_string($_POST['Username']);
                  // $Password = mysqli_real_escape_string($_POST['Password']);
                 // $uname = $_POST['Username'];
                    //$password = $_POST['Password'];

                   $Username = $_POST['username'];
                   $Password = $_POST['password'];

                  $sql="SELECT * FROM User Where Username='".$Username."' and Password='".$Password."' ";

                  $result = dbQuery($sql);
				
                  if(dbNumRows($result) == 1){
                      $row = dbFetchArray($result);

                      $_SESSION["UserID"] = $row["ID"];
                      $_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ 
                          msgSuccess();
                      }

                      if ($_SESSION["Userlevel"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                          msgSuccess();
                      }
                  }else{
                    msgError();
                  }
                  
 
function msgError(){
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Username หรือ Password ไม่ถูกต้อง?',
        confirmButtonText: `ตกลง`,
        denyButtonText: `Don't save`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
             window.location.href='login.php';
        } 
      })
            
   </script>
 ";
}
 function msgSuccess(){
    echo "<script> 
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'ยินดีต้อนรับ',
                showConfirmButton: false,
                timer: 1500
            })
        setTimeout(function(){ 
                window.location.href='frontpage.php'
            }, 3000);
        </script>";
}
?>