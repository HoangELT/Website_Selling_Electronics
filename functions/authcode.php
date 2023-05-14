<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");

if(isset($_POST['register-btn']))
{
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $phone= mysqli_real_escape_string($conn,$_POST['phone']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword= mysqli_real_escape_string($conn,$_POST['cpassword']);


    //Check email already 
    $check_email_query="SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run= mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0){
        redirect("../register.php", "Email của bạn đã được sử dụng. Xin hãy sử dụng Email khác");
    }
    //Check password no match
    else
    {
        if($password == $cpassword)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //Inser user data
                $pass_hash= password_hash($password,PASSWORD_DEFAULT);
                $insert_query= "INSERT INTO `users` (`name`,`email`,`phone`,`password`) VALUES ('$name','$email','$phone','$pass_hash')";
                $insert_query_run=mysqli_query($conn,$insert_query);
                if($insert_query_run){
                    redirect("../login.php", "Đăng ký tài khoản thành công");
                }else
                {
                    redirect("../register.php", "Đã xảy ra lỗi");
                }
            }else{
                redirect("../register.php", "Địa chỉ email không hợp lệ");
            }
        }else{
            redirect("../register.php", "Mật khẩu không khớp");
        }
    }  
}
else if(isset($_POST['login_btn']))
{
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $login_query="SELECT * FROM `users` WHERE `email`='$email'";
    $login_query_run=mysqli_query($conn,$login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $userdata   =   mysqli_fetch_array($login_query_run);
        $verify= password_verify($password, $userdata['password']);
        if($verify)
        {
            $_SESSION['auth']=true;

            $userid     =   $userdata['id'];
            $username   =   $userdata['name'];
            $useremail  =   $userdata['email'];
            $role_as    =   $userdata['role_as'];
            
            $_SESSION['auth_user']=[
                'id'    =>  $userid,
                'name'  =>  $username,
                'email' =>  $useremail
            ];
            
            $_SESSION['role_as']= $role_as;
            if($role_as == 1)
            {   
                redirect("../admin/index.php", "Welcome to ADMIN ");
            }else
            {
                redirect("../index.php", "Đăng nhập thành công");
            }
        }
        else
        {
            redirect("../login.php", "Mật khẩu không đúng");
        }
    }else
    {
        redirect("../login.php", "Tài khoản email không tồn tại");
    }
}
else if(isset($_POST['update_user_btn']))
{
    $id=$_SESSION['auth_user']['id'];
    $name= $_POST['name'];

    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
    if(empty($password))
    {
            $update_query= "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `address`='$address' WHERE `id`='$id' ";
            $update_query_run=mysqli_query($conn,$update_query);
            if($update_query_run)
            {
                redirect("../user-profile.php","Cập nhật thông tin thành công");
            }
            else
            {
                redirect("../user-profile.php","Xảy ra lỗi, vui lòng cập nhật lại");
            }
    }
    else
    {
        if($password == $cpassword)
        {
            $p_hash= password_hash($password,PASSWORD_DEFAULT);
            $update_query= "UPDATE `users` SET `name`='$name', `email`='$email', `phone`='$phone', `address`='$address', `password`='$p_hash' WHERE `id`='$id' ";
            $update_query_run=mysqli_query($conn,$update_query);
            if($update_query_run)
            {
                redirect("../user-profile.php","Cập nhật thông tin thành công");
            }
            else
            {
                redirect("../user-profile.php","Xảy ra lỗi, vui lòng cập nhật lại");
            }
        }else
        {
            redirect("../user-profile.php","Mật khẩu không khớp, vui lòng nhập lại");
        }
    }

    

   
   
}
?>