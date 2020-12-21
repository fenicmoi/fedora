<?php   
include("header.php");
include("define.php");
include("navbar.php");

//menu for admin
@$menu = $_GET['menu'];
if($menu == ''){
    $menu = 'home';
}
if($menu =='home'){
    include("content.php");
}elseif($menu =="project"){
    include("project.php");
}elseif($menu == "list"){
    include("list.php");
}elseif($menu == "group"){
    include("manage_group.php");
}elseif($menu == "class"){
    include("manage_class.php");
}elseif($menu == "type"){
    include("manage_type.php");
}elseif($menu == "userProvince"){
    include("user/project.php");
}elseif($menu == 'subProject'){
    include("user/sub_project.php");
}


include("footer.php");
?>