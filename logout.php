<?php 
session_start();
include("./functions/userfunctions.php");
if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    redirect("index.php", "Đăng xuất thành công");
}
header('Location: index.php');
include("./includes/footer.php");
?>
