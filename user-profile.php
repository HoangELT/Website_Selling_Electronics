<?php 

include("./includes/header.php");

if (!isset($_SESSION['auth_user']['id'])){
    die("Tu choi truy cap");
}


$id = $_SESSION['auth_user']['id'];

$users = getByID("users",$id);                              
$data= mysqli_fetch_array($users);

?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<body>

    <!-- header -->
 
    <!-- end header -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h1 >Trang cá nhân</h1>
            </div>
            <div class="col-md-8">
                <form action="./functions/authcode.php" method="POST">
                        <label class="mb-0" for=""><b>Họ và tên</b></label>
                        <input class="form-control" required type="text" name="name" value="<?= $data['name']?>" ><br>
                        <label class="mb-0" for=""><b>Email</b></label>
                        <input class="form-control" required type="text" name="email" value="<?= $data['email']?>" ><br>
                        <label class="mb-0" for=""><b>Số điện thoại</b></label>
                        <input class="form-control" required type="text" name="phone" value="<?= $data['phone']?>"><br>
                        <label class="mb-0" for=""><b>Địa chỉ</b></label>
                        <input class="form-control" required type="text" name="address" value="<?= $data['address']?>" ><br>
                        <label class="mb-0" for=""><b>Mật khẩu</b></label>
                        <input class="form-control" type="password" name="password" ><br>
                        <label class="mb-0" for=""><b>Xác nhận mật khẩu</b></label>
                        <input class="form-control" type="password" name="cpassword"><br> 
                        <input type="hidden" name="update_user_btn" value="true">   
                        <button type="submit" class="btn btn-primary" >Lưu</button>
                </form>         
            </div>           
        </div>
    </div>
</body>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
  <?php if(isset($_SESSION['message']))
  {
  ?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?= $_SESSION['message'] ?>');
  <?php 
    unset($_SESSION['message']);
  }
  ?>
</script>
</html>