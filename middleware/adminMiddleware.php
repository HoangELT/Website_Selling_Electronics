<?php
include("../functions/myfunctions.php");
if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] != 1)
    {
         redirect(" ../index.php", "Bạn không có quyền truy cập trang này!");
    }
}else
{   
    redirect("../login.php", "Đăng nhập để tiếp tục");
} 
?>