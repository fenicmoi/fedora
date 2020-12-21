<?php   
include("header.php");
include("define.php");
include("navbar.php");

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
}

include("footer.php");
?>