<?php 
include("./includes/header.php");

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<body>

    <!-- header -->
 
    <!-- end header -->
    <?php if(isset($_SESSION['message']))
            {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong><?= $_SESSION['message']; ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Thoát"></button>
                </div>
            <?php
                unset($_SESSION['message']);
            }
                
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1 >Chi tiết tài khoản</h1>
            </div>
            <?php 
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    $users = getByID("users",$id);                   
                    if(mysqli_num_rows($users)>0)
                    {
                        $data= mysqli_fetch_array($users);
                        ?>
                            <div class="col-md-8">
                                <form action="./functions/authcode.php" method="POST">
                                        <label class="mb-0" for=""><b>Họ và Tên</b></label>
                                        <input class="form-control" type="text" name="name" value="<?= $data['name']?>" ><br>
                                        <label class="mb-0" for=""><b>Email</b></label>
                                        <input class="form-control" type="text" name="email" value="<?= $data['email']?>" ><br>
                                        <label class="mb-0" for=""><b>Số điện thoại</b></label>
                                        <input class="form-control" type="text" name="phone" value="<?= $data['phone']?>"><br>
                                        <label class="mb-0" for=""><b>Địa chỉ</b></label>
                                        <input class="form-control" type="text" name="address" value="<?= $data['address']?>" ><br>
                                        <label class="mb-0" for=""><b>Mật khẩu</b></label>
                                        <input class="form-control" type="password" name="password" value="<?= $data['password']?>" ><br>
                                        <label class="mb-0" for=""><b>Xác nhận mật khẩu</b></label>
                                        <input class="form-control" type="password" name="cpassword" value="<?= $data['password']?>" ><br> 
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">   
                                        <button type="submit" name="update_user_btn" class="btn btn-primary" >Lưu</button>
                                </form>           
                        <?php
                    }else
                    {
                        echo "Không tìm thấy tài khoản";
                    }
                }
                else
                {
                    echo "ID không có trong url";
                }
            ?>         
        </div>           
    </div>

</body>
</html>